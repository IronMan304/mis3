<?php

namespace App\Http\Livewire\Request;

use App\Models\Tool;
use App\Models\Request;
use App\Models\ToolRequest;
use Livewire\Component;
use App\Models\Borrower;

class RequestForm extends Component
{
    public $requestId, $tool_id, $user_id, $borrower_id, $status_id;
    public $toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash
    public $search = '';
    public $selectedTools = [];

    protected $listeners = [
        'requestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
        //$this->dispatchBrowserEvent('resetSelect2', ['id' => 'tools']);
    }


    // edit
    public function requestId($requestId)
    {
        $this->requestId = $requestId;
        $request = Request::with('tool_keys.tools')->findOrFail($requestId);

        $this->tool_id = $request->tool_id;
        $this->borrower_id = $request->borrower_id;

        // Populate toolItems with the IDs of associated tools
        $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();

        // Populate selectedTools with the associated tools
        $this->selectedTools = $request->tool_keys->pluck('tools')->flatten();

        // You might need to adjust other fields as per your application's requirements
    }


    //store
    public function store()
    {
        $data = $this->validate([
            'user_id' => 'nullable',
            'borrower_id' => 'required',
            'toolItems' => 'required|array',
        ]);

        // Include the 'user_id' in the data array
        $data['user_id'] = auth()->user()->id;

        if ($this->requestId) {
            $request = Request::findOrFail($this->requestId);
            $request->update($data);

            $this->updateToolRequest($request);
             // Update the tool status to 'Requested' (assuming 2 represents 'Requested')
             Tool::whereIn('id', $this->toolItems)->update(['status_id' => 2]);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            // When creating a new tool request, set the 'user_id'
            $data['user_id'] = auth()->user()->id;

            // Create the request
            $request = Request::create($data);

            // Update the tool status to 'Requested' (assuming 2 represents 'Requested')
            Tool::whereIn('id', $this->toolItems)->update(['status_id' => 2]);

            // Create the tool request relationships
            $this->createToolRequest($request);

            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRequestModal');
        $this->emit('refreshParentRequest');
        $this->emit('refreshTable');
    }

    public function render()
    {

        if (empty($this->search)) {
            $tools  = Tool::all();
        } else {
            $tools  = Tool::where('brand', 'LIKE', '%' . $this->search . '%')->get();
        }
        //$tools = Tool::where('status_id', 1)->get();
        $tools = Tool::all();
        $borrowers = Borrower::all();
        return view('livewire.request.request-form', [
            'tools' => $tools,
            'borrowers' => $borrowers
        ]);
    }

    private function createToolRequest($request)
    {
        foreach ($this->toolItems as $toolId) {
            ToolRequest::create([
                'request_id' => $request->id,
                'tool_id' => $toolId,
                'status_id' => 6,
            ]);
        }
    }

    private function updateToolRequest($request)
    {
        // Get the previous tool IDs
        $previousToolIds = $request->tool_keys->pluck('tool_id')->toArray();
    
        // Remove existing tool request relationships
        $request->tool_keys()->delete();
    
        // Create new tool request relationships
        $this->createToolRequest($request);
    
        // Touch the Request model to update the updated_at timestamp
        $request->touch();
    
        // Update the status_id of previously chosen tools back to 1
        $toolsToReset = array_diff($previousToolIds, $this->toolItems);
        Tool::whereIn('id', $toolsToReset)->update(['status_id' => 1]);
    }
    

    public function addTool()
    {
        $this->toolItems[] = [
            'toolId' => null
        ];
    }

    public function deleteTool($toolIndex)
    {
        unset($this->toolItems[$toolIndex]);
        $this->toolItems = array_values($this->toolItems);
    }

    public function getToolIds()
    {
        return array_map(function ($item) {
            return ['tool_id' => $item['toolId']];
        }, $this->toolItems);
    }
}
