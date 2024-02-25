<?php

namespace App\Http\Livewire\Request;

use App\Models\Tool;
use App\Models\Request;
use Livewire\Component;
use App\Models\ToolRequest;

class SecurityApprovalForm extends Component
{
    public $requestId, $borrower_id, $request, $rttskStatusId = 0;
    public $action = '';  //flash
    public $message = '';  //flash
    public $approvalStatus = [
        'head_of_office' => 11,
        'vp' => 11,
        'president' => 11
    ];

    protected $approvedRttsKeys = [];
    public $toolItems = [];

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
        // $request = Request::whereId($requestId)->first();
        $request = Request::with('tool_keys.tools')->findOrFail($requestId);
        $this->request = $request;
        $this->borrower_id = $request->borrower_id;
        // Populate toolItems with the IDs of associated tools
        $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();
    }


    public function hOOAprroval($requestId)
    {

        if ($this->requestId) {


            $request = Request::find($this->requestId);
            $allApproved = true; // Flag to track if all rtts_keys are approved
            // $request->update(['current_security_id' => 5]); //5 means vp
            $currentSecurityId = null; // Initialize to null
            $foundSecurityId = false; // Flag to track if a security_id greater than 3 is found

            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    if ($rtts_key->security_id > 3) {
                        // If a security_id greater than 3 is found and it's not yet set
                        // Set currentSecurityId to this security_id
                        if (!$foundSecurityId || $rtts_key->security_id < $currentSecurityId) {
                            $currentSecurityId = $rtts_key->security_id;
                            $foundSecurityId = true; // Set the flag to true since a valid security_id is found
                        }
                    }
                }
            }

            // If a security_id greater than 3 is found, update the Request status
            if ($foundSecurityId) {
                $request->update(['current_security_id' => $currentSecurityId]);
            }



            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {

                        if ($rtts_key->security_id == 3) //head of office
                        {
                            $rtts_key->update(['status_id' => 10]); // Update the status to "Approved"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                            $this->approvalStatus['head_of_office'] =  10;
                            // Save the ID of the approved rtts_key
                            $this->approvedRttsKeys[] = $rtts_key->id;
                            //dd($this->approvedRttsKeys);
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

    public function hOOReject($requestId)
    {

        if ($this->requestId) {

            $request = Request::find($this->requestId);

            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {

                        if ($rtts_key->security_id == 3) //head of office
                        {
                            $rtts_key->update(['status_id' => 15]); // Update the status to "Rejected"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                            $request->update(['status_id' => 15]);

                            // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
                            //Request::where('id', $this->requestId)->update(['status_id' => 8]);

                            // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
                            Tool::whereIn('id', $this->toolItems)->update(['status_id' => 1]);
                        }
                    }
                }
            }

            $action = 'cancel';
            $message = 'Request Rejected';
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
            $currentSecurityId = null; // Initialize to null
            $foundSecurityId = false; // Flag to track if a security_id greater than 3 is found

            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    if ($rtts_key->security_id > 5) {
                        // If a security_id greater than 3 is found and it's not yet set
                        // Set currentSecurityId to this security_id
                        if (!$foundSecurityId || $rtts_key->security_id < $currentSecurityId) {
                            $currentSecurityId = $rtts_key->security_id;
                            $foundSecurityId = true; // Set the flag to true since a valid security_id is found
                        }
                    }
                }
            }

            // If a security_id greater than 3 is found, update the Request status
            if ($foundSecurityId) {
                $request->update(['current_security_id' => $currentSecurityId]);
            }


            foreach ($request->tool_keys as $toolKey) {
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {

                        if ($rtts_key->security_id == 5) //vp
                        {
                            $rtts_key->update(['status_id' => 10]); // Update the status to "Approved"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                            $this->approvalStatus['vp'] =  $rtts_key->status_id;
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

    public function vPReject($requestId)
    {

        if ($this->requestId) {

            $request = Request::find($this->requestId);

            foreach ($request->tool_keys as $toolKey) {
      
                foreach ($toolKey->rtts_keys as $rtts_key) {
                    $request = Request::find($requestId);

                    if ($request) {

                        if ($rtts_key->security_id == 5) //vp
                        {
                            $rtts_key->update(['status_id' => 15]); // Update the status to "Rejected"
                            $rtts_key->update(['user_id' => auth()->user()->id]);
                            $request->update(['status_id' => 15]);

                            // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
                            //Request::where('id', $this->requestId)->update(['status_id' => 8]);

                            // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
                            Tool::whereIn('id', $this->toolItems)->update(['status_id' => 1]);
                            ToolRequest::whereIn('id', $this->toolItems)->update(['status_id' => 1]);

                           
                        }
                    }
                }

         
                    $toolKey->update(['status_id' => 15]);
                

                $action = 'cancel';
                $message = 'Request Rejected';
            }
            $this->emit('flashAction', $action, $message);
            $this->resetInputFields();
            $this->emit('closeSecurityApprovalModal');
            $this->emit('refreshParentSecurityApproval');
            $this->emit('refreshTable');
        }
    }

    public function pApproval($requestId)
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
                            $this->approvalStatus['president'] =  $rtts_key->status_id;
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
