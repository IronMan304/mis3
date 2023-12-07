<?php

namespace App\Http\Livewire\College;

use App\Models\College;
use Livewire\Component;

class CollegeForm extends Component
{
    public $collegeId, $description, $code;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'collegeId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function collegeId($collegeId)
    {
        $this->collegeId = $collegeId;
        $college = College::whereId($collegeId)->first();
        $this->description = $college->description;
        $this->code = $college->code;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
            'code' => 'required'
        ]);

        if ($this->collegeId) {
            College::whereId($this->collegeId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            College::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeCollegeModal');
        $this->emit('refreshParentCollege');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.college.college-form');
    }
}
