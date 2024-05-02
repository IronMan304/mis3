<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\Tool;
use App\Models\Source;
use App\Models\Service;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\DB;

class ServiceRequestForm extends Component
{
    public $serviceRequestId, $borrower_id, $service_id, $tool_id, $staff_user_id, $status_id, $errorMessage, $source_id, $tool_status_id;
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
        $this->tool_status_id = $serviceRequest->tool_status_id;
        
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
            'tool_status_id' => 'nullable',
        ]);

        $borrower = Borrower::findOrFail($this->borrower_id);
        // Get the current year
        $currentYear = date('Y');
        
        $position = $borrower->position->description;
        $prefix = strtoupper(substr($position, 0, 1)); // Capitalize the first letter of the position
        
        // Get the last request number for the current year
        $lastRequestNumber = DB::table('service_requests')
            ->where('request_number', 'like', $prefix . 'SR' . $currentYear . '%')
            ->max('request_number');
        
        // Extract the number part and increment it
        if ($lastRequestNumber) {
            $lastNumber = (int)substr($lastRequestNumber, -4); // Extract the last 4 digits
            $newNumber = $lastNumber + 1;
        } else {
            // If no previous request number exists, start with 1
            $newNumber = 1;
        }
        
        // Pad the number with leading zeros if necessary
        $newNumberPadded = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        
        // Generate the new request number
        $data['request_number'] = $prefix . 'SR' . $currentYear . $newNumberPadded;

        $tool = Tool::findOrFail($this->tool_id);
        $data['tool_status_id'] = 14; //In Request
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
