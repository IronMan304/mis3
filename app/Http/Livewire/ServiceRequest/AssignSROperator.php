<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\Tool;
use App\Models\Service;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Operator;
use App\Models\ServiceRequest;
use App\Models\Source;

class AssignSROperator extends Component
{
    public $serviceRequestId, $status_id, $errorMessage, $operator_id, $set_date, $tool_id;
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
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'status_id' => 'nullable',
            //'operator_id' => 'required',
            'set_date' => 'required',
        ]);

        //$tool = Tool::findOrFail($this->tool_id);
        //dd($toolsWithStatusOne);
        if ($this->serviceRequestId) {
            $data['status_id'] = 10; //Approved
            ServiceRequest::whereId($this->serviceRequestId)->first()->update($data);


            $tool = Tool::find($this->tool_id);
            if ($tool->status_id == 14 && $tool->source_id == 3) { // cictso
                // In request is 14
                $tool->update(['status_id' => 23]); // if In Approved sr, the tool that belongs to cictso in the inventory will be "TO be checked"
            } elseif ($tool->status_id == 14 && $tool->source_id == 4) { //personal
                $tool->update(['status_id' => 21]); // if In Approved sr, the tool that belongs to personal in the inventory will be "To be Handed"
            }
            //$tool->update(['status_id' => 23]);

            $action = 'edit';
            $message = 'Successfully Updated';
            $this->emit('flashAction', $action, $message);
            $this->resetInputFields();
            $this->emit('closeAssignSROperatorModal');
            $this->emit('refreshParentASRO');
            $this->emit('refreshTable');
        }
        // else {
        //     if ($tool->status_id == 1) {
        //         $data['staff_user_id'] = auth()->user()->id;
        //         $data['status_id'] = 11; //pending
        //         Tool::where('id', $this->tool_id)->update(['status_id' => 14]);
        //         ServiceRequest::create($data);
        //         $action = 'store';
        //         $message = 'Successfully Created';
        //         $this->emit('flashAction', $action, $message);
        //         $this->resetInputFields();
        //         $this->emit('closeServiceRequestModal');
        //         $this->emit('refreshParentServiceRequest');
        //         $this->emit('refreshTable');
        //     } else {
        //         $this->errorMessage = 'You can only request equipment that are In stock';
        //     }
        // }
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $services = Service::all();
        $tools = Tool::all();
        $sources = Source::all();
        $operators = Operator::all();

        return view('livewire.service-request.assign-s-r-operator', [
            'borrowers' => $borrowers,
            'services' => $services,
            'tools' => $tools,
            'errorMessage' => $this->errorMessage,
            'sources' => $sources,
            'operators' => $operators,
        ]);
    }
}
