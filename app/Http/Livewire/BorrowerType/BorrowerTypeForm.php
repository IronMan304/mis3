<?php

namespace App\Http\Livewire\BorrowerType;

use App\Models\BorrowerType;
use Livewire\Component;

class BorrowerTypeForm extends Component
{
    public $borrowerTypeId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'borrowerTypeId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function borrowerTypeId($borrowerTypeId)
    {
        $this->borrowerTypeId = $borrowerTypeId;
        $borrowerType = BorrowerType::whereId($borrowerTypeId)->first();
        $this->description = $borrowerType->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->borrowerTypeId) {
            BorrowerType::whereId($this->borrowerTypeId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            BorrowerType::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeBorrowerTypeModal');
        $this->emit('refreshParentBorrowerType');
        $this->emit('refreshTable');
    }
    public function render()
    {
        return view('livewire.borrower-type.borrower-type-form');
    }
}
