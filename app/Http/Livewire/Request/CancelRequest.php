<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Request;
use Livewire\Component;
use App\Models\ToolRequest;

class CancelRequest extends Component
{
    public $requestId, $cancel_reason, $errorMessage;
    public $approval_toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'requestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function requestId($requestId)
    {
        $this->requestId = $requestId;
        $cancel_request = Request::whereId($requestId)->first();
        $this->cancel_reason = $cancel_request->cancel_reason;
        $this->approval_toolItems = $cancel_request->tool_keys->map(function ($tool) {
            return $tool->tool_id;
        })->toArray();
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'cancel_reason' => 'required',
        ]);

        if ($this->requestId) {
            $request = Request::whereId($this->requestId)->first();
            if ($request->status_id == 11 || $request->status_id == 16 || $request->status_id == 10 || $request->status_id == 6) { //can only cancel if request is still not completed or incomplete
                Request::whereId($this->requestId)->first()->update($data);

                // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
                Request::where('id', $this->requestId)->update([
                    'status_id' => 8,
                    'dt_cancelled_user_id' => auth()->user()->id,
                    'dt_cancelled' => Carbon::now()->setTimezone('Asia/Manila'),
                ]);

                foreach ($this->approval_toolItems as $toolId) {
                    $toolRequest = ToolRequest::where('request_id', $this->requestId)
                        ->where('tool_id', $toolId)
                        ->first();
                    $toolRequest->update([
                        'status_id' => 8, // cancelled

                    ]);
                }

                // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
                Tool::whereIn('id', $this->approval_toolItems)->update(['status_id' => 1]);

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
        return view('livewire.request.cancel-request', [
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
