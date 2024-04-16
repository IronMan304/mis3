<?php

namespace App\Http\Livewire\Sex;

use App\Models\Sex;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class SexList extends Component
{
    public $sexId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentSex' => '$refresh',
        'deleteSex',
        'editSex',
        'deleteConfirmSex'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createSex()
    {
        $this->emit('resetInputFields');
        $this->emit('openSexModal');
    }

    public function editSex($sexId)
    {
        $this->sexId = $sexId;
        $this->emit('sexId', $this->sexId);
        $this->emit('openSexModal');
    }

    public function deleteSex($sexId)
    {
        $sex = Sex::find($sexId);

        if (!$sex) {
            $action = 'error';
            $message = 'Sex not found';
            $description = ''; // No description available if sex is not found
        } else {
            $description = $sex->description; // Store the description before deletion
            $sex->delete();
            $action = 'delete';
            $message = 'Successfully Deleted';
        }

        // Log the activity
        activity()
            ->performedOn($sex ?? null) // Pass $sex if it exists, otherwise pass null
            ->event( $action)
            ->withProperties([
                // 'action' => $action,
                'name' => $description, // Pass the description as an additional property
            ])
            ->log(auth()->user()->first_name . ' ' . $action . 'd ' . $description);

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }


    public function render()
    {
        if (empty($this->search)) {
            $sexes  = Sex::all();
        } else {
            $sexes  = Sex::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }
        $activity_logs = Activity::all();

        return view('livewire.sex.sex-list', [
            'sexes' => $sexes,
            'activity_logs' => $activity_logs,
        ]);
    }
}
