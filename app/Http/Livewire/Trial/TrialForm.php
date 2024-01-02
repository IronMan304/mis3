<?php

namespace App\Http\Livewire\Trial;

use App\Models\Trial;
use Livewire\Attributes\Url;
use Livewire\Component;

class TrialForm extends Component
{
    #[Url()]
    public $trialId, $description;

    public $action = '';  //flash
    public $message = '';  //flash


    protected $listeners = [
        'trialId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->trialId) {
            Trial::whereId($this->trialId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Trial::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeTrialModal');
        $this->emit('refreshParentTrial');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.trial.trial-form');
    }
}
