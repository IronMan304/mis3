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


class ReturnForm extends Component
{
    public $returnId, $borrower_id, $status_id, $selectedCondition, $selectedToolId;
    public $return_toolItems = [];
    public $action = '';  //flash
    public $message = '';  //flash

    public $selectedTools = [];
    // Add this property to your Livewire component
    public $selectedConditionStatus;

    protected $listeners = [
        'returnId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function returnId($requestId)
    {
        $this->returnId = $requestId;
        $return = Request::find($requestId);
        $this->borrower_id = $return->borrower_id;

        // Assuming there is a tools relationship in your Request model
        $this->return_toolItems = $return->tool_keys->map(function ($tool) {
            return $tool->tool_id;
        })->toArray();

        $this->selectedTools = $return->tool_keys->map(function ($tool) {
            return $tool->tools;
        })->flatten();
        // $this->toolItems = $return->tools->map->id->toArray(); // A shorter version using arrow functions (PHP 7.4+)

        //dd($this->toolItems);    
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'borrower_id' => 'required',
            'return_toolItems' => 'required|array',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 7; //for returning

        if ($this->returnId) {
            // Update the main request data
            $request = Request::whereId($this->returnId)->first();
            $request->update($data);

            // Update the status_id and returned_at for the returned tools in the ToolRequest table
            foreach ($this->return_toolItems as $toolId) {
                $toolRequest = ToolRequest::where('request_id', $this->returnId)
                    ->where('tool_id', $toolId)
                    ->first();

                if ($toolRequest->returned_at == null) {
                    $toolRequest->update([
                        'status_id' => 7,
                        'returned_at' => Carbon::now()->setTimezone('Asia/Manila'),  // Update the returned_at timestamp for the specific tool
                    ]);
                } else {
                    $toolRequest->update([
                        'status_id' => 7,
                    ]);
                }
            }
            // Update the tool status to 'Requested' (assuming 2 represents 'Requested')
            //Tool::whereIn('id', $this->return_toolItems)->update(['status_id' => 1]);

            // Get the tool IDs that should be updated
            // $toolIdsToUpdate = ToolRequest::join('tools', 'tool_requests.tool_id', '=', 'tools.id')
            //     ->whereIn('tool_requests.tool_id', $this->return_toolItems)
            //     ->whereColumn('tool_requests.updated_at', '!=', 'tools.updated_at')
            //     ->pluck('tool_requests.tool_id');

            // // Update the tool status to 'Requested' (assuming 2 represents 'Requested') for the selected tools
            // Tool::whereIn('id', $toolIdsToUpdate)->update(['status_id' => 1]);

            foreach ($this->return_toolItems as $toolId) {
                $tool = Tool::find($toolId);
            
                if ($tool->status_id == 2) {
                    $tool->update(['status_id' => $this->selectedConditionStatus]);
                }
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
        $this->emit('closeReturnModal');
        $this->emit('refreshParentReturn');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $tools = Tool::all();
        $tool_requests = ToolRequest::all();

        // Eager load relationships and select the 'id' attribute

        $requests  = Request::with('tool_keys.tools.type')->get();
        // Inspect the loaded relationships

        // Eager load relationships (Tool, Request, Status) and select specific attributes
        $requests = ToolRequest::with(['tools', 'requests', 'status'])->get();
        //dd($requests);
        //dump($this->returnId);
        $statuses = Status::all();

        return view('livewire.request.return-form', [
            'borrowers' => $borrowers,
            'tools' => $tools,
            'requests' => $requests,
            'tool_requests' => $tool_requests,
            'statuses' => $statuses,
            'selectedConditionStatus' => $this->selectedConditionStatus,
        ]);
    }

    //    public function updateStatusId()
    // {
    //     // Update $status_id based on the selected condition
    //     if ($this->selectedCondition == 1) {
    //         // Good condition
    //         $this->status_id = 1;
    //     } elseif ($this->selectedCondition == 4) {
    //         // Another condition (adjust as needed)
    //         $this->status_id = 4;
    //     } else {
    //         // Default value or handle other conditions
    //         $this->status_id = null;
    //     }

    //     // Update the tool status to $this->status_id
    //     Tool::whereIn('id', $this->return_toolItems)->update(['status_id' => $this->status_id]);
    // }


}
