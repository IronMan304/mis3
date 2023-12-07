<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
use Livewire\Component;

class StatusList extends Component
{
    public $statusId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentStatus' => '$refresh',
        'deleteStatus',
        'editStatus',
        'deleteConfirmStatus'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createStatus()
    {
        $this->emit('resetInputFields');
        $this->emit('openStatusModal');
    }

    public function editStatus($statusId)
    {
        $this->statusId = $statusId;
        $this->emit('statusId', $this->statusId);
        $this->emit('openStatusModal');
    }

    public function deleteStatus($statusId)
    {
        Status::destroy($statusId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $statuses  = Status::all();
        } else {
            $statuses  = Status::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.status.status-list', [
            'statuses' => $statuses
        ]);
    }
}
