<?php

namespace App\Http\Livewire\Request;

use App\Models\Request;
use Livewire\Component;

class SecurityApprovalForm extends Component
{
    public $requestId, $borrower_id;
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
        $request = Request::whereId($requestId)->first();
        $this->borrower_id = $request->borrower_id;
    }

    //store
    public function store()
    {
   

        // if ($this->requestId) {
        //     Request::whereId($this->requestId)->first()->update($data);
        //     $action = 'edit';
        //     $message = 'Successfully Updated';
        // } else {
        //     Request::create($data);
        //     $action = 'store';
        //     $message = 'Successfully Created';
        // }

        if ($this->requestId){
            $request = Request::find($this->requestId);

            foreach ($request->tool_keys as $toolKey){
                foreach ($toolKey->rtts_keys as $rtts_key){
                    if($rtts_key->security_id == 3) //head of office
                    {
                        $rtts_key->update(['status_id' => 10]); // Update the status to "Approved"
                    }
                }
            }
     
        // if ($request) {
        //     if ($request->status_id != 2) {
        //         $request->update(['status_id' => 10]); // Update the status to "Approved"
        //         $action = 'edit';
        //         $message = 'Request Approved';
        //         $this->emit('flashAction', $action, $message);
        //     }
        // }

        $action = 'edit';
        $message = 'Request Approved';
        }
        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeSecurityApprovalModal');
        $this->emit('refreshParentSecurityApproval');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.request.security-approval-form');
    }
}
