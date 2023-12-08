<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Sex;
use App\Models\Course;
use App\Models\College;
use Livewire\Component;
use App\Models\Borrower;

class BorrowerForm extends Component
{
    public $borrowerId, $id_number, $first_name, $middle_name, $last_name, $contact_number, $sex_id, $college_id, $course_id, $status_id;
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
        $this->id_number = $borrower->id_number;
        $this->first_name = $borrower->first_name;
        $this->middle_name = $borrower->middle_name;
        $this->last_name = $borrower->last_name;
        $this->contact_number = $borrower->contact_number;
        $this->sex_id = $borrower->sex_id;
        $this->college_id = $borrower->college_id;
        $this->course_id = $borrower->course_id;
        $this->status_id = $borrower->status_id;
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
            'sex_id' => 'nullable',
            'college_id' => 'nullable',
            'course_id' => 'required',
            'status_id' => 'nullable',
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
        $sexes = Sex::all();
        $colleges = College::all();
        $courses = Course::where('college_id', $this->college_id)->get();
        return view('livewire.borrower.borrower-form', [
            'sexes' => $sexes,
            'colleges' => $colleges,
            'courses' => $courses
        ]);
    }
}
