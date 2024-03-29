<?php

namespace App\Http\Livewire\Operator;

use App\Models\Operator;
use App\Models\Sex;
use Livewire\Component;

class OperatorForm extends Component
{
    public $operatorId, $first_name, $middle_name, $last_name, $contact_number, $sex_id, $status_id, $user_id;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'operatorId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function operatorId($operatorId)
    {
        $this->operatorId = $operatorId;
        $operator = Operator::whereId($operatorId)->first();
        $this->first_name = $operator->first_name;
        $this->middle_name = $operator->middle_name;
        $this->last_name = $operator->last_name;
        $this->contact_number = $operator->contact_number;
        $this->sex_id = $operator->sex_id;
        $this->status_id = $operator->status_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'contact_number' => 'required',
            'sex_id' => 'nullable',
            'status_id' => 'nullable',
        ]);

        if ($this->operatorId) {
            Operator::whereId($this->operatorId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $data['status_id'] = 18; // means available
            Operator::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeOperatorModal');
        $this->emit('refreshParentOperator');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $sexes = Sex::all();
        return view('livewire.operator.operator-form', [
            'sexes' => $sexes,
        ]);
    }
}
