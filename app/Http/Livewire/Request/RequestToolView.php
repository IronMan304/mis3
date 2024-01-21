<?php

namespace App\Http\Livewire\Request;

use App\Models\Request;
use App\Models\Status;
use App\Models\Tool;
use App\Models\ToolRequest;
use Livewire\Component;

class RequestToolView extends Component
{
    public $requestId;
    public $action = '';  //flash
    public $message = '';  //flash
    public $search = '';
    public $isApproved = false;
    public $toolItems = [];
    protected $listeners = [
        //'refreshParentRequest' => '$refresh',
        'requestId' => 'loadRequestTool',
        'resetInputFields',
        'approveBooking',
    ];

    public function approveRequest($requestId)
    {
        $request = Request::find($requestId);

        if ($request) {
            if ($request->status_id != 2) {
                $request->update(['status_id' => 10]); // Update the status to "Approved"
                $action = 'edit';
                $message = 'Request Approved';
                // $this->emit('flashAction', $action, $message);

                ToolRequest::where('request_id', $request->id)
                ->update(['status_id' => 10]); // approved tools
            }
        }
        // $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();
        // foreach ($this->toolItems as $toolId) {
        //     ToolRequest::create([
        //         'request_id' => $request->id,
        //         //'tool_id' => $toolId,
        //         'status_id' => 6, // In Request
        //     ]);
        // }

      

    $this->emit('flashAction', $action, $message);
    $this->resetInputFields();
    $this->emit('closeRequestToolViewModal');
    $this->emit('refreshParentRequest');
    $this->emit('refreshTable');

        // $this->resetPage();
    }

    public function loadRequestTool($requestId)
    {
        $this->requestId = $requestId;
        //$this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        $tools = Tool::all();
        $statuses = Status::all();
        $tool_requests = ToolRequest::all();
        $requests = Request::with('borrower')->get();
          // Modify the line below to filter requests by $requestId
          $requests = Request::with('borrower')->where('id', $this->requestId)->get();

        return view('livewire.request.request-tool-view', [
            'requests' => $requests,
            'tools' => $tools,
            'statuses' => $statuses,
            'tool_requests' => $tool_requests,
        ]);
    }
}
