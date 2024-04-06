<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\Tool;
use App\Models\Option;
use App\Models\ServiceRequest;
use Livewire\Component;
use App\Models\Operator;
use App\Models\RequestOperatorKey;
use App\Models\Service;

class ServiceRequestStart extends Component
{
    public $serviceRequestId, $option_id, $errorMessage, $tool_status_id;
    public $action = '';  //flash
    public $message = '';  //flash
    public $operator_id, $tool_id;
    //public $approval_toolItems = '';

    protected $listeners = [
        'serviceRequestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function serviceRequestId($serviceRequestId)
    {
        $this->serviceRequestId = $serviceRequestId;
        $serviceRequest = ServiceRequest::whereId($serviceRequestId)->first();
        if (auth()->user()->hasRole('operator')) {
            // Fetch the user_id from the Borrower table using the authenticated user's id
            $this->operator_id = Operator::where('user_id', auth()->user()->id)->value('id');
        } else {
            $this->operator_id = $serviceRequest->operator_id;
        }

        // $this->operatorItems = $request->request_operator_keys->map(function ($operator) {
        //     return $operator->operator_id;
        // })->toArray();
        // $this->approval_toolItems = $request->tool_keys->map(function ($tool) {
        //     return $tool->tool_id;
        // })->toArray();
        $this->tool_id = $serviceRequest->tool_id;
        $this->tool_status_id = $serviceRequest->tool_status_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'operator_id' => auth()->user()->hasRole('operator') ? 'nullable' : 'required',
            'tool_status_id' => 'nullable',
        ]);

        if ($this->serviceRequestId) {
            $serviceRequest = ServiceRequest::whereId($this->serviceRequestId)->first();
            if ($serviceRequest->status_id == 10) { //approved
                // Check if the user has the "requester" role
                if (auth()->user()->hasRole('operator')) {
                    // Fetch the user_id from the Borrower table using the authenticated user's id
                    $data['operator_id'] = Operator::where('user_id', auth()->user()->id)->value('id');
                }

                // ServiceRequest::update($data);
                ServiceRequest::whereId($this->serviceRequestId)->first()->update($data);

                $serviceRequest->update(['status_id' => 6]); // In progress

                // foreach ($this->approval_toolItems as $toolId) {
                //     $tool = Tool::find($toolId);
                //     if ($tool && $tool->status_id == 17) {
                //         $tool->update(['status_id' => 2]); // if approved, the tool in the inventory will be "In Use"
                //     }
                // }

                $tool = Tool::find($this->tool_id);
                if ($tool && $tool->status_id == 21 || $tool->status_id == 23) { // to be handed || TO be checked
                    $tool->update(['status_id' => 5]); // if In progress sr, the tool in the inventory will be "In Repair"
                    $serviceRequest->update(['tool_status_id' => 5]); // In Repair
                }

                //$data['tool_status_id'] = 5; //In Repair
                $action = 'edit';
                $message = 'Successfully Updated';
                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeServiceRequestStartModal');
                $this->emit('refreshParentRequestStart');
                $this->emit('refreshTable');
            } else {
                $this->errorMessage = 'You can only start once this requests has been Approved';
            }
        }
    }

    public function render()
    {
        $options = Option::all();
        $operators = Operator::all();
        return view('livewire.service-request.service-request-start', [
            'options' => $options,
            'operators' => $operators,
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
