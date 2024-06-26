<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\Tool;
use App\Models\User;
use App\Models\Source;
use App\Models\Service;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Operator;
use App\Models\ServiceRequest;

class AssignSROperator extends Component
{
    public $serviceRequestId, $status_id, $errorMessage, $operator_id, $set_date, $tool_id, $tool_status_id, $technician_id;
    public $action = '';  //flash
    public $message = '';  //flash

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
        $this->status_id = $serviceRequest->status_id;
        //$this->operator_id = $serviceRequest->operator_id;
        $this->set_date = $serviceRequest->set_date;
        $this->tool_id = $serviceRequest->tool_id;
        $this->tool_status_id = $serviceRequest->tool_status_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'status_id' => 'nullable',
            //'operator_id' => 'required',
            'set_date' => 'required',
            'tool_status_id' => 'nullable',
        ]);

        if ($this->serviceRequestId) {
            $serviceRequest = ServiceRequest::whereId($this->serviceRequestId)->first();
            $serviceRequest->status_id = 10; // Approved
            $serviceRequest->set_date = $data['set_date'];

            $tool = Tool::find($this->tool_id);
            if ($tool->status_id == 14 && $tool->source_id == 3) { // cictso
                $serviceRequest->tool_status_id = 23; // "To be checked"
                $tool->status_id = 23;
            } elseif ($tool->status_id == 14 && $tool->source_id == 4) { // personal
                $serviceRequest->tool_status_id = 21; // "To be Handed"
                $tool->status_id = 21;
            }
            // else {
            //     $serviceRequest->tool_status_id = $data['tool_status_id'];
            // }

            $serviceRequest->save();
            $tool->save();

            $action = 'edit';
            $message = 'Successfully Updated';
            $this->emit('flashAction', $action, $message);
            $this->resetInputFields();
            $this->emit('closeAssignSROperatorModal');
            $this->emit('refreshParentASRO');
            $this->emit('refreshTable');
        }
    }

    public function rejectServiceRequest($serviceRequestId)
    {
        $serviceRequest = ServiceRequest::findOrFail($serviceRequestId);
        $serviceRequest->status_id = 15; // Set status to Rejected
        $serviceRequest->tool_status_id = 15;
        $serviceRequest->save();

        Tool::where('id', $this->tool_id)->update(['status_id' => 1]); // In stock

        $action = 'edit';
        $message = 'Service Request Rejected';
        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeAssignSROperatorModal');
        $this->emit('refreshParentASRO');
        $this->emit('refreshTable');
    }


    public function render()
    {
        $borrowers = Borrower::all();
        $services = Service::all();
        $tools = Tool::all();
        $sources = Source::all();
        $operators = Operator::all();
        $technicians = User::role('technician')->get();

        // $technicians = User::whereHas('roles', function ($query) {
        //     $query->where('role_id', 12); // Assuming 12 is the role ID for "technician"
        // })->get();
        

        return view('livewire.service-request.assign-s-r-operator', [
            'borrowers' => $borrowers,
            'services' => $services,
            'tools' => $tools,
            'errorMessage' => $this->errorMessage,
            'sources' => $sources,
            'technicians' => $technicians,
            'operators' => $operators,
        ]);
    }
}
