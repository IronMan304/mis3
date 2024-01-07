<?php

namespace App\Http\Livewire\Request;

use App\Models\Tool;
use App\Models\Status;
use App\Models\Request;
use App\Models\ToolRequest;
use Livewire\Component;

class RequestList extends Component
{
    public $requestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentRequest' => '$refresh',
        'refreshParentReturn' => '$refresh',
        'deleteRequest',
        'editRequest',
        'deleteConfirmRequest',
        'cancelRequest' => 'handleCancelRequest', 
    ];

    public function handleCancelRequest($requestId)
    {
        // Retrieve tool items associated with the request
        $toolItems = Request::find($requestId)->tool_keys->pluck('tool_id')->toArray();

        if ($requestId) {
            // Handle the cancellation logic here
            Request::where('id', $requestId)->update(['status_id' => 8]);
     
    
            // Assuming you want to update the status of associated tools
            Tool::whereIn('id', $toolItems)->update(['status_id' => 1]);

               // Update the status_id of each ToolRequest
        ToolRequest::where('request_id', $requestId)->update(['status_id' => 8]);
    
            $action = 'cancel';
            $message = 'Request Cancelled';
    
            $this->emit('flashAction', $action, $message);
            $this->emit('refreshTable');
        }
    
    }

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openRequestModal');
    }

    public function editRequest($requestId)
    {
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openRequestModal');
    }
    public function returnRequest($requestId)
    {
        //dd($requestId);
        $this->requestId = $requestId;
        $this->emit('returnId', $this->requestId);
        $this->emit('openReturnModal');
    }
    public function deleteRequest($requestId)
    {
        Request::destroy($requestId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function cancelRequest($requestId)
    {
        if ($requestId) {
            // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
            Request::where('id', $requestId)->update(['status_id' => 8]);

            // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
            Tool::whereIn('id', $this->toolItems)->update(['status_id' => 1]);

            $action = 'cancel';
            $message = 'Request Cancelled';
        }


        // $action = 'error';
        // $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        // $requests = Request::with('tool_keys.tools.type')->get();

        // dd($requests);

        if (empty($this->search)) {
            $requests  = Request::with('tool_keys.tools.type')->get();
        } else {
            $requests  = Request::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        $tools = Tool::all();
        $statuses = Status::all();
        $tool_requests = ToolRequest::all();
        return view('livewire.request.request-list', [
            'requests' => $requests,
            'tools' => $tools,
            'statuses' => $statuses,
            'tool_requests' => $tool_requests,
        ]);
    }
}
