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

        $sex = null;
        $formerDescription = null;
        if ($this->sexId) {
            $sex = Sex::findOrFail($this->sexId);
            $formerDescription = $sex->description; // Capture the former description
            $sex->update($data);
            $this->action = 'edit';
            $this->message = 'Successfully Updated';
        } else {
            $sex = Sex::create($data);
            $this->action = 'store';
            $this->message = 'Successfully Created';
        }

        // Log the activity
        $activityLog =
            activity()
            ->performedOn($sex)
            ->withProperties([
                // 'action' => $this->action,
                'new_name' => $data['description'], // Always include the new description
            ])
            ->event($this->action);
        if ($this->action === 'edit') {
            $activityLog->withProperty('old_name', $formerDescription); // Include old name only for edit action
            $activityLog->log(auth()->user()->first_name . ' ' . $this->action . 'ed ' . $formerDescription . ' to ' . $data['description']);
        } else {
            $activityLog->log(auth()->user()->first_name . ' ' . $this->action . 'd ' . $data['description']);
        }


        $this->emit('flashAction', $this->action, $this->message);
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
