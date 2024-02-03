<?php

namespace App\Http\Livewire\Request;

use Illuminate\Support\Facades\Request as IlluminateRequest;
use App\Models\Borrower;
use App\Models\Request;
use App\Models\Status;
use App\Models\Tool;
use App\Models\ToolRequest;
use Livewire\Component;
use Carbon\Carbon;


class ApprovalForm extends Component
{
    public $approvalId, $borrower_id, $status_id, $selectedCondition, $selectedToolId, $description;
    public $approval_toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash

    public $selectedTools = [];
    // Add this property to your Livewire component
    public $selectedConditionStatus;

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

        // Assuming there is a tools relationship in your Request model
        $this->approval_toolItems = $return->tool_keys->map(function ($tool) {
            return $tool->tool_id;
        })->toArray();

        $this->selectedTools = $return->tool_keys->map(function ($tool) {
            return $tool->tools;
        })->flatten();
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'nullable',
            'approval_toolItems' => 'required|array',
        ]);
        //$data['user_id'] = auth()->user()->id;
        //$data['status_id'] = 16; //for returning

        if ($this->approvalId) {

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

            // Handle tools that are not in $this->approval_toolItems
            $unapprovedTools = Tool::whereNotIn('id', $this->approval_toolItems)->get();

            foreach ($unapprovedTools as $tool) {
                $tool_requests = ToolRequest::where('request_id', $this->approvalId)->where('tool_id', $tool->id)->where('status_id', 14)->get();

                foreach ($tool_requests as $tool_request) {
                    if ($this->selectedConditionStatus == 10) {
                        // If status is approved and tool is not in approval_toolItems, set tool in the inventory to "In stock"
                        $tool->update(['status_id' => 1]);
                        $tool_request->update(['status_id' => 15]);
                    } elseif ($this->selectedConditionStatus == 15) {
                        // If status is rejected and tool is not in approval_toolItems, set tool in the inventory to "On hold"
                        $tool->update(['status_id' => 17]);
                        $tool_request->update(['status_id' => 10]); //rejected
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
            $message = 'Successfully Returned';
        } else {
            Request::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeApprovalModal');
        $this->emit('refreshParentApproval');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $tools = Tool::all();
        $tool_requests = ToolRequest::all();

        $requests  = Request::with('tool_keys.tools.type')->get();

        // Eager load relationships (Tool, Request, Status) and select specific attributes
        $requests = ToolRequest::with(['tools', 'requests', 'status'])->get();
        //dd($requests);
        //dump($this->approvalId);
        $statuses = Status::all();

        return view('livewire.request.approval-form', [
            'borrowers' => $borrowers,
            'tools' => $tools,
            'requests' => $requests,
            'tool_requests' => $tool_requests,
            'statuses' => $statuses,
            'selectedConditionStatus' => $this->selectedConditionStatus,
        ]);
    }
}
