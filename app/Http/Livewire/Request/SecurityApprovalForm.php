<?php

namespace App\Http\Livewire\Request;

use App\Models\Request;
use Livewire\Component;

class SecurityApprovalForm extends Component
{
    public $requestId, $borrower_id, $request, $rttskStatusId;
    public $action = '';  //flash
    public $message = '';  //flash
    public $approvalStatus = [
        'head_of_office' => false,
        'vp' => false,
        'president' => false
    ];

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
        $this->request = $request;
        $this->borrower_id = $request->borrower_id;
    }


    public function hOOAprroval($requestId)
    {

        if ($this->requestId) {


            $request = Request::find($this->requestId);
            $allApproved = true; // Flag to track if all rtts_keys are approved

            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {

                        if ($rtts_key->security_id == 3) //head of office
                        {
                            $rtts_key->update(['status_id' => 10]); // Update the status to "Approved"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                            $this->approvalStatus['head_of_office'] =  $rtts_key->status_id;
                        }
                        // Check if any rtts_key is not approved
                        if ($rtts_key->status_id != 10) {
                            $allApproved = false;
                        }
                    }
                }
            }
            // If all rtts_keys are approved, update the Request status
            if ($allApproved) {
                $request->update(['status_id' => 10]);
            }

            $action = 'edit';
            $message = 'Request Approved';
        }


        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeSecurityApprovalModal');
        $this->emit('refreshParentSecurityApproval');
        $this->emit('refreshTable');
    }

    public function vPAprroval($requestId)
    {
        if ($this->requestId) {
            $request = Request::find($this->requestId);
            $allApproved = true; // Flag to track if all rtts_keys are approved

            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {

                        if ($rtts_key->security_id == 5) //vp
                        {
                            $rtts_key->update(['status_id' => 10]); // Update the status to "Approved"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                        }
                        // Check if any rtts_key is not approved
                        if ($rtts_key->status_id != 10) {
                            $allApproved = false;
                        }
                    }
                }
            }
            // If all rtts_keys are approved, update the Request status
            if ($allApproved) {
                $request->update(['status_id' => 10]);
            }
            $this->approvalStatus['vp'] = true;
            $action = 'edit';
            $message = 'Request Approved';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeSecurityApprovalModal');
        $this->emit('refreshParentSecurityApproval');
        $this->emit('refreshTable');
    }

    public function pAprroval($requestId)
    {
        if ($this->requestId) {
            $request = Request::find($this->requestId);
            $allApproved = true; // Flag to track if all rtts_keys are approved

            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {
                        if ($rtts_key->security_id == 6) //president
                        {
                            $rtts_key->update(['status_id' => 10]); // Update the status to "Approved"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                        }
                        // Check if any rtts_key is not approved
                        if ($rtts_key->status_id != 10) {
                            $allApproved = false;
                        }
                    }
                }
            }
            // If all rtts_keys are approved, update the Request status
            if ($allApproved) {
                $request->update(['status_id' => 10]);
            }
            $this->approvalStatus['president'] = true;
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

        $approvalStatus =  $this->approvalStatus['head_of_office'];
        return view('livewire.request.security-approval-form', [
            'approvalStatus' => $approvalStatus,
        ]);
    }
}
