<?php

namespace App\Http\Livewire\Request;

use App\Models\Tool;
use App\Models\Request;
use App\Models\ToolRequest;
use Livewire\Component;
use App\Models\Borrower;

class ReturnForm extends Component
{
    public $returnId, $tool_id, $user_id, $borrower_id, $status_id;
    public $toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash
    public $search = '';

    protected $listeners = [
        'returnId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function returnId($returnId)
    {
        $this->returnId = $returnId;
        $request = Request::whereId($returnId)->first();
        $this->tool_id = $request->tool_id;
        $this->borrower_id = $request->borrower_id;
        //$this->status_id = $request->status_id;
        if ($request->tool_keys != null) {
            $this->toolItems = collect($request->tool_keys)->map(function ($toolKey) {
                return ['toolId' => $toolKey->tool_id];
            })->toArray();
        } else {
            // If no branches are associated with the user, initialize an empty array
            $this->toolItems = [];
        }
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'user_id' => 'nullable',
            'borrower_id' => 'required',
            'toolItems.*.toolId' => 'nullable',
        ]);
        // Include the 'user_id' in the data array
        $data['user_id'] = auth()->user()->id;


        if ($this->returnId) {
            foreach ($this->toolItems as $item) {
                $toolId = isset($item['toolId']) ? $item['toolId'] : null;
                Tool::where('id', $toolId)->update(['status_id' => 1]);
            }

            $request = Request::whereId($this->returnId)->first();

            $this->updateToolRequest($request);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            // When creating a new tool, set the 'user_id'
            $data['user_id'] = auth()->user()->id;


            // Update the tool status to 'Requested' (assuming 2 represents 'Requested')
            foreach ($this->toolItems as $item) {
                $toolId = isset($item['toolId']) ? $item['toolId'] : null;
                Tool::where('id', $toolId)->update(['status_id' => 2]);
            }

            $request = Request::create($data);

            $this->createToolRequest($request);

            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeReturnModal');
        $this->emit('refreshParentReturn');
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
        //$requests = Request::all();
        return view('livewire.request.return-form', [
            'tools' => $tools,
            'borrowers' => $borrowers,
            //'requests' => $requests
        ]);
    }

    private function createToolRequest($request)
    {
        foreach ($this->toolItems as $item) {
            $toolId = isset($item['toolId']) ? $item['toolId'] : null;
            ToolRequest::create([
                'request_id' => $request->id,
                'tool_id' => $toolId,
                'status_id' => 6,
            ]);
        }
    }

    private function updateToolRequest($request)
    {
        foreach ($this->toolItems as $item) {
            $toolId = isset($item['toolId']) ? $item['toolId'] : null;

            // Use the 'update' method to update the existing records
            ToolRequest::where([
                'request_id' => $request->id,
                'tool_id' => $toolId,
            ])->update([
                'status_id' => 7, // Update the status_id here
                // other fields you want to update
            ]);
        }
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
        // Computed property to get selected tools
   // Computed property to get selected tools
   public function getSelectedToolsProperty()
   {
       // Filter tools based on selected tool ids in $toolItems
       return Tool::whereIn('id', collect($this->toolItems)->pluck('toolId'))->get();
   }
}
