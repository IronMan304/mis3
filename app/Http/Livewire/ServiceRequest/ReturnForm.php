<?php

namespace App\Http\Livewire\ServiceRequest;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Status;
use App\Models\Request;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\ToolRequest;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Request as IlluminateRequest;


class ReturnForm extends Component
{
    public $returnId, $borrower_id, $status_id, $selectedCondition, $description, $errorMessage, $tool_id, $tool_status_id;
    public $action = '';  //flash
    public $message = '';  //flash

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
    public function returnId($serviceRequestId)
    {
        $this->returnId = $serviceRequestId;
        $return = ServiceRequest::find($serviceRequestId);
        $this->borrower_id = $return->borrower_id;
        $this->tool_id = $return->tool_id;
        $this->description = $return->description;
        $this->tool_status_id = $return->tool_status_id;

        // Assuming there is a tools relationship in your Request model
        // $this->return_toolItems = $return->tool_keys->map(function ($tool) {
        //     return $tool->tool_id;
        // })->toArray();

        // $this->selectedTools = $return->tool_keys->map(function ($tool) {
        //     return $tool->tools;
        // })->flatten();
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'required',
            'tool_id' => 'required',
            'selectedConditionStatus' => 'required',
            'description' => 'nullable',
            'tool_status_id' => 'nullable',
        ]);

        if ($this->returnId) {
            $serviceRequest = ServiceRequest::whereId($this->returnId)->first();
            if ($serviceRequest->status_id == 6 || $serviceRequest->status_id == 12 ) { // In progress
 
            $serviceRequest->update(['status_id' => 12]); // Completed
            $serviceRequest->update(['description' => $this->description]); 
            $serviceRequest->update(['tool_status_id' => $this->selectedConditionStatus]);
                    
      
                $tool = Tool::find($this->tool_id);
                // if ($tool->status_id == 5 && $tool->source_id == 3 && $this->selectedConditionStatus == 1) { // cictso
                //     $serviceRequest->tool_status_id = 23; // "To be checked"
                //     $tool->status_id = $this->selectedConditionStatus;
                // } elseif ($tool->status_id == 5 && $tool->source_id == 4 ) { // personal
                //     $serviceRequest->tool_status_id = 21; // "To be Handed"
                //     $tool->status_id = 21;
                // } 
                // $request = Request::find($this->returnId);
            
                // $toolKey = $request->tool_keys->where('tool_id', $toolId)->where('status_id', 6)->first();
            
                //if ($tool && $tool->status_id == 5) {  // if in repair pa ang tool 
                    $tool->update(['status_id' => $this->selectedConditionStatus]);
                    
                
                $action = 'edit';
                $message = 'Successfully Returned';
                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeSReturnModal');
                $this->emit('refreshParentSReturn');
                $this->emit('refreshTable');
            
            } else {
                $this->errorMessage = 'You can only return/report if this request is in progress or completed';
            }
        }
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $tools = Tool::all();

        $service_requests  = ServiceRequest::with('tool.type')->get();

        $statuses = Status::all();

        return view('livewire.service-request.return-form', [
            'borrowers' => $borrowers,
            'tools' => $tools,
            'service_requests' => $service_requests,
            'statuses' => $statuses,
            'selectedConditionStatus' => $this->selectedConditionStatus,
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
