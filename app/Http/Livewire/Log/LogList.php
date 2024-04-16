<?php

namespace App\Http\Livewire\Log;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class LogList extends Component
{
    public $logId, $activity_Logs;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentLog' => '$refresh',
        'deleteLog',
        'editLog',
        'deleteConfirmLog'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createLog()
    {
        $this->emit('resetInputFields');
        $this->emit('openLogModal');
    }

    public function editLog($logId)
    {
        $this->logId = $logId;
        $this->emit('logId', $this->logId);
        $this->emit('openLogModal');
    }

    public function render()
    {
        if (empty($this->search)) {
            $logs  = Activity::all();
        } else {
            $logs  = Activity::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }
        $activity_logs = Activity::all();

        return view('livewire.log.log-list', [
            'logs' => $logs,
            'activity_logs' => $activity_logs,
        ]);
    }
}
