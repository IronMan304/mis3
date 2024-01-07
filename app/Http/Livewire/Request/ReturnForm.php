<?php

namespace App\Http\Livewire\Request;

use Illuminate\Support\Facades\Request as IlluminateRequest;
use App\Models\Borrower;
use App\Models\Request;
use App\Models\Status;
use App\Models\Tool;
use App\Models\ToolRequest;
use Livewire\Component;
use Carbon\Carbon;


class ReturnForm extends Component
{
    public $returnId, $borrower_id, $status_id, $selectedCondition, $selectedToolId, $description;
    public $return_toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash

    public $selectedTools = [];
    // Add this property to your Livewire component
    public $selectedConditionStatus;

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
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'required',
            'return_toolItems' => 'required|array',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 7; //for returning

        if ($this->returnId) {

            // Update the status_id and returned_at for the returned tools in the ToolRequest table
            foreach ($this->return_toolItems as $toolId) {
                $toolRequest = ToolRequest::where('request_id', $this->returnId)
                    ->where('tool_id', $toolId)
                    ->first();
            
                if ($toolRequest->returned_at == null) {
                    $statusId = ($this->selectedConditionStatus == 3) ? 9 : 7;
            
                    $toolRequest->update([
                        'status_id' => $statusId,
                        'user_id' => auth()->user()->id,
                        'returner_id' => $this->borrower_id,
                        'tool_status_id' => $this->selectedConditionStatus,
                        'description' => $this->description,
                        'returned_at' => Carbon::now()->setTimezone('Asia/Manila'),
                    ]);
                } else {
                    // Handle the case where returned_at is not null
                    $toolRequest->update([
                        //'status_id' => 7,
                        'user_id' => auth()->user()->id,
                    ]);
                }
            }
            
            foreach ($this->return_toolItems as $toolId) {
                $tool = Tool::find($toolId);

                if ($tool->status_id == 2) {
                    $tool->update(['status_id' => $this->selectedConditionStatus]);
                }
            }

            $action = 'edit';
            $message = 'Successfully Returned';
        } else {
            Request::create($data);
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
        $borrowers = Borrower::all();
        $tools = Tool::all();
        $tool_requests = ToolRequest::all();

        $requests  = Request::with('tool_keys.tools.type')->get();

        // Eager load relationships (Tool, Request, Status) and select specific attributes
        $requests = ToolRequest::with(['tools', 'requests', 'status'])->get();
        //dd($requests);
        //dump($this->returnId);
        $statuses = Status::all();

        return view('livewire.request.return-form', [
            'borrowers' => $borrowers,
            'tools' => $tools,
            'requests' => $requests,
            'tool_requests' => $tool_requests,
            'statuses' => $statuses,
            'selectedConditionStatus' => $this->selectedConditionStatus,
        ]);
    }
}
