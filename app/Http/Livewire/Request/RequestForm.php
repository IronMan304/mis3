<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\User;
use App\Models\Option;
use App\Models\Request;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Operator;
use App\Models\ToolRequest;
use App\Models\ToolPosition;
use App\Models\ToolSecurity;
use App\Models\RequestToolToolSecurityKey;
use Illuminate\Support\Facades\Broadcast;

class RequestForm extends Component
{
    public $requestId, $tool_id, $user_id, $borrower_id, $status_id, $position_id, $first_name, $option_id, $estimated_return_date, $purpose, $date_needed, $errorMessage, $borrowerId;

    public $toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash
    public $search = '';
    public $selectedTools = [];
    // public $securityButton = false;
    // public $userPositionId = auth()->user()->position_id;

    public function mount()
    {
        if (auth()->user()->hasRole('requester')) {
            $this->borrower_id = Borrower::where('user_id', auth()->user()->id)->value('id');
            $this->first_name = Borrower::where('user_id', auth()->user()->id)->value('first_name');
            $this->position_id = Borrower::where('user_id', auth()->user()->id)->value('position_id');
        }
    }
    public function setBorrowerId($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        
        // Update the borrower_id field with the received borrowerId
        $this->borrower_id = $borrowerId;
    }
    protected $listeners = [
        'requestId',
        'resetInputFields',
        'borrowerId' => 'setBorrowerId',
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
        //$this->dispatchBrowserEvent('resetSelect2', ['id' => 'tools']);
    }

    // edit
    public function requestId($requestId)
    {
        $this->requestId = $requestId;
        $request = Request::with('tool_keys.tools')->findOrFail($requestId);
        //$this->borrowerId = $this->borrowerId;
        $this->tool_id = $request->tool_id;
        $this->borrower_id = $request->borrower_id;
        $this->option_id = $request->option_id;
        $this->estimated_return_date = $request->estimated_return_date;
        $this->purpose = $request->purpose;
        $this->date_needed = $request->date_needed;

        // Populate toolItems with the IDs of associated tools
        $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();

        // Populate selectedTools with the associated tools
        $this->selectedTools = $request->tool_keys->pluck('tools')->flatten();

        //$this->borrower_id1 = Borrower::where('user_id', auth()->user()->id)->value('id');

    }


    //store
    public function store()
    {
        $data = $this->validate([
            'user_id' => 'nullable',
            'borrower_id' => auth()->user()->hasRole('requester') ? 'nullable' : 'required',
            'option_id' => 'required',
            'estimated_return_date' => 'required|date',
            'purpose' => 'nullable',
            'toolItems' => 'required|array',
            'date_needed' => 'required|date',
            //'current_security_id' => 'nullable',
        ]);

        // Include the 'user_id' in the data array
        $data['user_id'] = auth()->user()->id;

        // Check if the user has the "requester" role
        if (auth()->user()->hasRole('requester')) {
            // Fetch the user_id from the Borrower table using the authenticated user's id
            $data['borrower_id'] = Borrower::where('user_id', auth()->user()->id)->value('id');
        }

        $toolsWithStatusOne = Tool::whereIn('id', $this->toolItems)->where('status_id', 1)->get();
        if ($this->requestId) {
            // $request = Request::findOrFail($this->requestId);
            // $request->update($data);

            // $this->updateToolRequest($request);
            // // Update the tool status to 'Requested' (assuming 2 represents 'Requested')
            // Tool::whereIn('id', $this->toolItems)->update(['status_id' => 2]);
            // $action = 'edit';
            // $message = 'Successfully Updated';
        } else {
            if ($toolsWithStatusOne->count() === count($this->toolItems)) {
                // When creating a new tool request, set the 'user_id'
                $data['user_id'] = auth()->user()->id;


                if (auth()->user()->hasRole('staffss')) {
                    $data['status_id'] = 16; // "Reviewed" is the status of a requests table if admin makes the request
                    Tool::whereIn('id', $this->toolItems)->update(['status_id' => 17]); // "On hold" is the status of a tool if staff makes the request
                    $request = Request::create($data);
                    foreach ($this->toolItems as $toolId) {
                        $toolRequest = ToolRequest::create([ //request_tools
                            'request_id' => $request->id,
                            'tool_id' => $toolId,
                            'status_id' => 10, // "Approved" is the status of a tool_requests if admin makes the request
                        ]);

                        // // Fetch security_id for the current tool
                        // $securityId = ToolSecurity::where('tool_id', $toolId)->value('security_id');
                        // Create a record in request_tool_tool_security table
                        // RequestToolToolSecurityKey::create([
                        //     'request_tools_id' => $toolRequest->id,
                        //     'security_id' => $securityId,
                        // ]);

                        // Fetch all security_ids for the current tool
                        $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();


                        // Create a record in request_tool_tool_security table for each security_id
                        foreach ($securityIds as $securityId) {
                            RequestToolToolSecurityKey::create([
                                'request_tools_id' => $toolRequest->id,
                                'security_id' => $securityId,
                            ]);
                            // if ($this->userPositionId == $securityId) {
                            //     // If position_id matches any of the security_id, set showButton to true
                            //     $securityButton = true;
                            //     break;
                            // }
                        }
                    }
                } else {
                    $data['status_id'] = 11; // Pending is the status of a requests if non admin makes the request
                    Tool::whereIn('id', $this->toolItems)->update(['status_id' => 14]); // "In request" is the status of a tool if non-admin makes the request

                    $request = Request::create($data);
                    foreach ($this->toolItems as $toolId) {
                        $toolRequest = ToolRequest::create([
                            'request_id' => $request->id,
                            'tool_id' => $toolId,
                            'status_id' => 14, // "In request" is the status of a tool_requests if non-admin makes the request
                        ]);

                        // Fetch all security_ids for the current tool
                        $securityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();

                        $minSecurityId = min($securityIds);
                        $maxSecurityId = max($securityIds);
                        // Create a record in request_tool_tool_security table for each security_id
                        foreach ($securityIds as $securityId) {
                            RequestToolToolSecurityKey::create([
                                'request_tools_id' => $toolRequest->id,
                                'security_id' => $securityId,
                                'status_id' => 11,
                                'request_id' => $request->id,
                            ]);
                        }

                        $request->update(['current_security_id' =>  $minSecurityId]);
                        $request->update(['max_security_id' =>  $maxSecurityId]);
                    }
                }

                // Create the request
                // $request = Request::create($data);

                // Create the tool request relationships
                // $this->createToolRequest($request);

                $action = 'store';
                $message = 'Successfully Created';
                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeRequestModal');
                $this->emit('refreshToolList');
                $this->emit('refreshParentRequest');
                $this->emit('refreshTable');
                // After the request is created or updated, broadcast an event
                // Broadcast::channel('tool-list-channel', 'ToolListUpdated', [
                //     'message' => 'Tool list updated',
                // ]);
            } else {
                $this->errorMessage = 'You can only request tools that are In stock';
            }
        }
    }

    public function render()
    {

        if (empty($this->search)) {
            $tools  = Tool::all();
        } else {
            $tools  = Tool::where('brand', 'LIKE', '%' . $this->search . '%')->get();
        }
        //$tools = Tool::where('status_id', 1)->get();
        $tools = Tool::all();

        if (auth()->user()->hasRole('admin')) {
            $borrowers = Borrower::all();
        } else {
            $borrowers = Borrower::all();
        }
        $borrowers = Borrower::all();
        $options = Option::all();

        //dd($selectedBorrower);

        return view('livewire.request.request-form', [
            'tools' => $tools,
            'borrowers' => $borrowers,
            'options' => $options,
            'errorMessage' => $this->errorMessage,
        ]);
    }

    // public function cancelRequest()
    // {
    //     // if ($this->requestId) {
    //     //     // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
    //     //     //Request::where('id', $this->requestId)->update(['status_id' => 8]);

    //     //     // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
    //     //     //Tool::whereIn('id', $this->toolItems)->update(['status_id' => 1]);

    //     //     $action = 'cancel';
    //     //     $message = 'Request Cancelled';

    //     // Emit the event with necessary data
    //     $this->emit('cancelRequest', $this->requestId, $this->toolItems);
    //     // }
    // }

    // private function createToolRequest($request)
    // {
    //     foreach ($this->toolItems as $toolId) {
    //         ToolRequest::create([
    //             'request_id' => $request->id,
    //             'tool_id' => $toolId,
    //             'status_id' => 14, // In Request means that tool is currently in request
    //         ]);
    //     }
    // }

    // private function updateToolRequest($request)
    // {
    //     // Get the previous tool IDs
    //     $previousToolIds = $request->tool_keys->pluck('tool_id')->toArray();

    //     // Remove existing tool request relationships
    //     $request->tool_keys()->delete();

    //     // Create new tool request relationships
    //     $this->createToolRequest($request);

    //     // Touch the Request model to update the updated_at timestamp
    //     $request->touch();

    //     // Update the status_id of previously chosen tools back to 1
    //     $toolsToReset = array_diff($previousToolIds, $this->toolItems);
    //     Tool::whereIn('id', $toolsToReset)->update(['status_id' => 1]);
    // }


    public function addTool()
    {
        $this->toolItems[] = [
            'toolId' => null
        ];
    }

    public function deleteTool($toolIndex)
    {
        unset($this->toolItems[$toolIndex]);
        $this->toolItems = array_values($this->toolItems);
    }

    public function getToolIds()
    {
        return array_map(function ($item) {
            return ['tool_id' => $item['toolId']];
        }, $this->toolItems);
    }
}
