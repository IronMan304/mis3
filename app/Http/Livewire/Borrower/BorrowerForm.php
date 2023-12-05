<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Borrower;
use Livewire\Component;

class BorrowerForm extends Component
{
    public $borrowerId, $id_number, $first_name, $middle_name, $last_name, $contact_number, $sex, $reported_at;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'borrowerId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function borrowerId($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $borrower = Borrower::whereId($borrowerId)->first();
        $this->first_name = $borrower->first_name;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'id_number' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'contact_number' => 'required',
            'sex' => 'nullable',
            'reported_at' => 'nullable',
        ]);

        if ($this->borrowerId) {
            Borrower::whereId($this->borrowerId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Borrower::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeBorrowerModal');
        $this->emit('refreshParentBorrower');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.borrower.borrower-form');
    }
}
