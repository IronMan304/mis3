<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Option;
use App\Models\Status;
use App\Models\Request;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Operator;
use App\Models\ToolRequest;
use App\Models\ToolSecurity;
use App\Models\RequestOperatorKey;
use App\Models\RequestToolToolSecurityKey;
use Illuminate\Support\Facades\Request as IlluminateRequest;


class ApprovalForm extends Component
{
    public $approvalId, $borrower_id, $status_id, $selectedCondition, $selectedToolId, $description, $option_id, $estimated_return_date, $errorMessage, $purpose, $request_status_id;
    public $approval_toolItems = [];
    public $operatorItems = [];
    public $action = '';  //flash
    public $message = '';  //flash

    public $selectedTools = [];
    // Add this property to your Livewire component
    public $selectedConditionStatus;
    public $toolItems = [];

    protected $listeners = [
        'approvalId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function approvalId($approvalId)
    {
        $this->approvalId = $approvalId;
        $return = Request::find($approvalId);
        $this->borrower_id = $return->borrower_id;
        $this->option_id = $return->option_id;
        $this->estimated_return_date = $return->estimated_return_date;
        $this->purpose = $return->purpose;
        $this->request_status_id = $return->status_id;

        // Assuming there is a tools relationship in your Request model
        $this->approval_toolItems = $return->tool_keys->map(function ($tool) {
            return $tool->tool_id;
        })->toArray();

        $this->selectedTools = $return->tool_keys->map(function ($tool) {
            return $tool->tools;
        })->flatten();

        $this->operatorItems = $return->request_operator_keys->map(function ($operator) {
            return $operator->operator_id;
        })->toArray();

        // Populate toolItems with the IDs of associated tools
        $this->toolItems = $return->tool_keys->pluck('tool_id')->toArray();
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'nullable',
            'approval_toolItems' => 'required|array',
            'selectedConditionStatus' => 'required',
            //'operatorItems' => $this->option_id == 1  && $this->request_status_id == 6 ? 'required|array' : 'nullable|array',
        ]);
        //$data['user_id'] = auth()->user()->id;
        //$data['status_id'] = 16; //for returning

        if ($this->approvalId) {
            $request = Request::whereId($this->approvalId)->first();
            if ($request->status_id == 11) {
                // Update the status_id and returned_at for the returned tools in the ToolRequest table
                foreach ($this->approval_toolItems as $toolId) {
                    $toolRequest = ToolRequest::where('request_id', $this->approvalId)
                        ->where('tool_id', $toolId)
                        ->first();

                    if ($toolRequest->approval_at == null) {
                        $statusId = ($this->selectedConditionStatus == 10) ? 10 : 15; // 10 = approved, 17 = On hold, 15 = Rejected

                        $toolRequest->update([
                            'status_id' => $statusId, //to know whether it is approved or rejected
                            'user_id' => auth()->user()->id, //rejected by
                            //'returner_id' => $this->borrower_id,
                            //'tool_status_id' => $this->selectedConditionStatus,
                            'description' => $this->description,
                            'approval_at' => Carbon::now()->setTimezone('Asia/Manila'),
                        ]);

                        if ($statusId == 10) {
                            $tool = Tool::find($toolId);
                            $tool->update(['status_id' => 17]); // if approved, the tool in the inventory will be "On hold"
                        }
                        if ($statusId == 15) {
                            $tool = Tool::find($toolId);
                            $tool->update(['status_id' => 1]); // if rejected, the tool in the inventory will be "In stock"

                        }
                    }
                }

                foreach ($this->operatorItems as $operatorId) {
                    RequestOperatorKey::create([
                        'request_id' => $this->approvalId,
                        'operator_id' => $operatorId,
                    ]);
                }

                // Handle tools that are not in $this->approval_toolItems
                $unapprovedTools = Tool::whereNotIn('id', $this->approval_toolItems)->get();

                foreach ($unapprovedTools as $tool) {
                    $tool_requests = ToolRequest::where('request_id', $this->approvalId)->where('tool_id', $tool->id)->where('status_id', 14)->get();

                    foreach ($tool_requests as $tool_request) {
                        if ($this->selectedConditionStatus == 10) {
                            // If status is approved and tool is not in approval_toolItems, set tool in the inventory to "In stock"
                            $tool->update(['status_id' => 1]);
                            $tool_request->update(['status_id' => 15]); //rejected
                            // foreach ($this->toolItems as $toolId) {
                            //     $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();
                            //     // Update records in RequestToolToolSecurityKey where the tool_id matches
                            //     RequestToolToolSecurityKey::where('security_id', $securityIds)
                            //     ->update(['status_id' => 15]);
                            // }

                        } elseif ($this->selectedConditionStatus == 15) {
                            // If status is rejected and tool is not in approval_toolItems, set tool in the inventory to "On hold"
                            $tool->update(['status_id' => 17]);
                            $tool_request->update(['status_id' => 10]); //approved
                        }
                    }
                }

                // Check if all $statusId values were 15, then set the status of the request to rejected (16)
                $allRejected = true;

                foreach ($this->approval_toolItems as $toolId) {
                    $toolRequest = ToolRequest::where('request_id', $this->approvalId)
                        ->where('tool_id', $toolId)
                        ->first();

                    if ($toolRequest->approval_at == null && $toolRequest->status_id != 15) {
                        $allRejected = false;
                        break;
                    }
                }

                if ($allRejected) {
                    $return = Request::find($this->approvalId);
                    $return->update(['status_id' => 15]); // rejected
                } else {
                    // Set the status_id for the Request model to 16
                    $return = Request::find($this->approvalId);
                    $return->update(['status_id' => 16]); // reviewed
                }


                $action = 'edit';
                $message = 'Successfully Responsed';
                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeApprovalModal');
                $this->emit('refreshParentApproval');
                $this->emit('refreshTable');
            } else {
                $this->errorMessage = 'You can only approve/reject if this request is still in pending status';
            }
        }
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $tools = Tool::all();
        $tool_requests = ToolRequest::all();
        $operators = Operator::all();

        $requests  = Request::with('tool_keys.tools.type')->get();

        // Eager load relationships (Tool, Request, Status) and select specific attributes
        $requests = ToolRequest::with(['tools', 'requests', 'status'])->get();
        //dd($requests);
        //dump($this->approvalId);
        $statuses = Status::all();
        $options = Option::all();

        return view('livewire.request.approval-form', [
            'borrowers' => $borrowers,
            'tools' => $tools,
            'requests' => $requests,
            'tool_requests' => $tool_requests,
            'statuses' => $statuses,
            'selectedConditionStatus' => $this->selectedConditionStatus,
            'options' => $options,
            'operators' => $operators,
            //'option_id' => $this->option_id,
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
