<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\Tool;
use App\Models\Service;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\ServiceRequest;
use App\Models\Source;

class ServiceRequestForm extends Component
{
    public $serviceRequestId, $borrower_id, $service_id, $tool_id, $staff_user_id, $status_id, $errorMessage, $source_id;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'serviceRequestId',
        'resetInputFields'
    ];

    public function updatedBorrowerId($value)
{
    $this->borrower_id = $value;
}

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
        $this->borrower_id = $serviceRequest->borrower_id;
        $this->service_id = $serviceRequest->service_id;
        $this->tool_id = $serviceRequest->tool_id;
        $this->staff_user_id = $serviceRequest->staff_user_id;
        $this->status_id = $serviceRequest->status_id;
        $this->source_id = $serviceRequest->source_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'required',
            'service_id' => 'required',
            'tool_id' => 'required',
            'staff_user_id' => 'nullable',
            'status_id' => 'nullable',
            'source_id' => 'required',
        ]);

        $tool = Tool::findOrFail($this->tool_id);
        //dd($toolsWithStatusOne);
        if ($this->serviceRequestId) {
            ServiceRequest::whereId($this->serviceRequestId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            if ($tool->status_id == 1) {
                $data['staff_user_id'] = auth()->user()->id;
                $data['status_id'] = 11; //pending
                Tool::where('id', $this->tool_id)->update(['status_id' => 14]);
                ServiceRequest::create($data);
                $action = 'store';
                $message = 'Successfully Created';
                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeServiceRequestModal');
                $this->emit('refreshParentServiceRequest');
                $this->emit('refreshTable');
            } else {
                $this->errorMessage = 'You can only request equipment that are In stock';
            }
        }
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $services = Service::all();
        $tools = Tool::all();
        $sources = Source::all();

        return view('livewire.service-request.service-request-form', [
            'borrowers' => $borrowers,
            'services' => $services,
            'tools' => $tools,
            'errorMessage' => $this->errorMessage,
            'sources' => $sources,
        ]);
    }
}
