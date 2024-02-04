<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use Livewire\Component;

class OptionForm extends Component
{
    public $optionId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'optionId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function optionId($optionId)
    {
        $this->optionId = $optionId;
        $option = Option::whereId($optionId)->first();
        $this->description = $option->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->optionId) {
            Option::whereId($this->optionId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Option::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeOptionModal');
        $this->emit('refreshParentOption');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.option.option-form');
    }
}
