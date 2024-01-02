<?php

namespace App\Http\Livewire\Trial;

use App\Models\Trial;
use Livewire\Component;

class TrialList extends Component
{
    public $trialId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentTrial' => '$refresh',
        'deleteTrial',
        'editTrial',
        'deleteConfirmTrial'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createTrial()
    {
        $this->emit('resetInputFields');
        $this->emit('openTrialModal');
    }

    public function editTrial($trialId)
    {
        $this->trialId = $trialId;
        $this->emit('trialId', $this->trialId);
        $this->emit('openTrialModal');
    }

    public function deleteTrial($trialId)
    {
        Trial::destroy($trialId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $trials  = Trial::all();
        } else {
            $trials  = Trial::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.trial.trial-list', [
            'trials' => $trials
        ]);
    }
}
