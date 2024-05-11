<?php

namespace App\Http\Livewire\ServiceRequest;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\ServiceRequest;
use Livewire\Component;

class CancelRequest extends Component
{
    public $serviceRequestId, $cancel_reason, $errorMessage, $tool_id;
    public $approval_toolItems = [];
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
        $cancel_request = ServiceRequest::whereId($serviceRequestId)->first();
        $this->cancel_reason = $cancel_request->cancel_reason;
        $this->tool_id = $cancel_request->tool_id;
     
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'cancel_reason' => 'required',
        ]);

        if ($this->serviceRequestId) {
            $service_request = ServiceRequest::whereId($this->serviceRequestId)->first();
            if ($service_request->status_id == 11 || $service_request->status_id == 16 || $service_request->status_id == 10 || $service_request->status_id == 6) { //can only cancel if request is still not completed or incomplete
                ServiceRequest::whereId($this->serviceRequestId)->first()->update($data);

                // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
                ServiceRequest::where('id', $this->serviceRequestId)->update([
                    'status_id' => 8,
                    'dt_cancelled_user_id' => auth()->user()->id,
                    'dt_cancelled' => Carbon::now()->setTimezone('Asia/Manila'),
                ]);


                // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
                Tool::where('id', $this->tool_id)->update(['status_id' => 1]);


                $action = 'edit';
                $message = 'Successfully Cancelled';


                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeCancelRequestModal');
                $this->emit('refreshParentCancelRequest');
                $this->emit('refreshTable');
            } else {
                $this->errorMessage = 'You can only cancel a request that is not completed or not incomplete';
            }
        }
    }

    public function render()
    {
        return view('livewire.service-request.cancel-request', [
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
