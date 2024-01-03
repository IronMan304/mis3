<?php

namespace App\Http\Livewire\Request;

use Illuminate\Support\Facades\Request as IlluminateRequest;
use App\Models\Borrower;
use App\Models\Request;
use App\Models\Tool;
use App\Models\ToolRequest;
use Livewire\Component;
use Carbon\Carbon;


class ReturnForm extends Component
{
    public $returnId, $borrower_id;
    public $return_toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash

    public $selectedTools = [];
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
    public function returnId($requestId)
    {
        $this->returnId = $requestId;
        $return = Request::find($requestId);
        $this->borrower_id = $return->borrower_id;

        // Assuming there is a tools relationship in your Request model
        $this->return_toolItems = $return->tool_keys->map(function ($tool) {
            return $tool->tool_id;
        })->toArray();

        $this->selectedTools = $return->tool_keys->map(function ($tool) {
            return $tool->tools;
        })->flatten();
        // $this->toolItems = $return->tools->map->id->toArray(); // A shorter version using arrow functions (PHP 7.4+)

        //dd($this->toolItems);    
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'required',
            'return_toolItems' => 'required|array',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 7;

        if ($this->returnId) {
           // Update the main request data
    $request = Request::whereId($this->returnId)->first();
    $request->update($data);

    // Update the status_id and returned_at for the returned tools in the ToolRequest table
    foreach ($this->return_toolItems as $toolId) {
        $toolRequest = ToolRequest::where('request_id', $this->returnId)
            ->where('tool_id', $toolId)
            ->first();

        if ($toolRequest->returned_at == null) {
            $toolRequest->update([
                'status_id' => 7,
                'returned_at' => Carbon::now()->setTimezone('Asia/Manila'),  // Update the returned_at timestamp for the specific tool
            ]);
        } else {
            $toolRequest->update([
                'status_id' => 7,
            ]);
        }
    }


            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Request::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeReturnModal');
        $this->emit('refreshParentRequest');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $tools = Tool::all();
        $tool_requests = ToolRequest::all();

        // Eager load relationships and select the 'id' attribute

        $requests  = Request::with('tool_keys.tools.type')->get();
        // Inspect the loaded relationships

        // Eager load relationships (Tool, Request, Status) and select specific attributes
        $requests = ToolRequest::with(['tools', 'requests', 'status'])->get();
        //dd($requests);
        //dump($this->returnId);

        return view('livewire.request.return-form', [
            'borrowers' => $borrowers,
            'tools' => $tools,
            'requests' => $requests,
            'tool_requests' => $tool_requests,
        ]);
    }
}
