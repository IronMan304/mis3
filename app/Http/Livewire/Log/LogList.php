<?php

namespace App\Http\Livewire\Log;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Livewire\WithPagination;

class LogList extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;

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
        $logsQuery = Activity::query();

        if (!empty($this->search)) {
            $logsQuery->where('description', 'LIKE', '%' . $this->search . '%');
        }

        $logs = $logsQuery->paginate($this->perPage);

        return view('livewire.log.log-list', [
            'logs' => $logs,
        ]);
    }
}
