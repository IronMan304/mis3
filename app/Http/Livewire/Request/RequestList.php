<?php

namespace App\Http\Livewire\Request;

use App\Models\Tool;
use App\Models\Status;
use App\Models\Request;
use Livewire\Component;

class RequestList extends Component
{
    public $requestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentRequest' => '$refresh',
        'deleteRequest',
        'editRequest',
        'deleteConfirmRequest'
    ];

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
    public function returnRequest($returnId)
    {
        $this->requestId = $returnId;
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
        return view('livewire.request.request-list', [
            'requests' => $requests,
            'tools' => $tools,
            'statuses' => $statuses
        ]);
    }
}
