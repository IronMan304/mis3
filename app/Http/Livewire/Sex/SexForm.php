<?php

namespace App\Http\Livewire\Sex;

use App\Models\Sex;
use Livewire\Component;

class SexForm extends Component
{
    public $sexId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'sexId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function sexId($sexId)
    {
        $this->sexId = $sexId;
        $sex = Sex::whereId($sexId)->first();
        $this->description = $sex->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->sexId) {
            Sex::whereId($this->sexId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Sex::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeSexModal');
        $this->emit('refreshParentSex');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.sex.sex-form');
    }
}
