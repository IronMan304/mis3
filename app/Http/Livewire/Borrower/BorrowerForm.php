<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Sex;
use App\Models\Course;
use App\Models\College;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Position;

class BorrowerForm extends Component
{
    public $borrowerId, $id_number, $first_name, $middle_name, $last_name, $contact_number, $sex_id, $position_id, $college_id, $course_id, $status_id;
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

    public function borrowerId($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $borrower = Borrower::find($borrowerId);
        if ($borrower) {
            $this->id_number = $borrower->id_number;
            $this->first_name = $borrower->first_name;
            $this->middle_name = $borrower->middle_name;
            $this->last_name = $borrower->last_name;
            $this->contact_number = $borrower->contact_number;
            $this->sex_id = $borrower->sex_id;
            $this->position_id = $borrower->position_id;
            $this->college_id = $borrower->college_id;
            $this->course_id = $borrower->course_id;
            $this->status_id = $borrower->status_id;
        }
    }

    public function store()
    {
        $rules = [
            'id_number' => 'required|unique:borrowers,id_number,' . $this->borrowerId,
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'contact_number' => 'required',
            'sex_id' => 'nullable',
            'position_id' => 'required',
            'college_id' => 'nullable',
            'course_id' => 'nullable',
            'status_id' => 'nullable',
        ];

        if ($this->position_id == 1) {
            $rules['course_id'] = 'required';
        }

        $data = $this->validate($rules);

        if ($this->borrowerId) {
            $borrower = Borrower::find($this->borrowerId);
            $this->logChanges($borrower, $data);
            $borrower->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $borrower = Borrower::create($data);
            $this->logNewBorrower($borrower);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeBorrowerModal');
        $this->emit('refreshParentBorrower');
        $this->emit('refreshTable');
    }

    private function logChanges($borrower, $data)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . ' updated borrower: ';

        $fields = ['id_number', 'first_name', 'middle_name', 'last_name', 'contact_number', 'sex_id', 'position_id', 'college_id', 'course_id', 'status_id'];
        foreach ($fields as $field) {
            if ($borrower->$field != $data[$field]) {
                $properties["old_$field"] = $borrower->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst(str_replace('_', ' ', $field)) . ": " . $borrower->$field . " to " . $data[$field] . ", ";
            }
        }

        if (!empty($properties)) {
            activity()
                ->performedOn($borrower)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }

    private function logNewBorrower($borrower)
    {
        $properties = [
            'new_id_number' => $borrower->id_number,
            'new_first_name' => $borrower->first_name,
        ];

        $logMessage = auth()->user()->first_name . ' created borrower. Id number: ' . $borrower->id_number . ', First name: ' . $borrower->first_name . '.';

        activity()
            ->performedOn($borrower)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
    }

    public function render()
    {
        $sexes = Sex::all();
        $positions = Position::all();
        $colleges = College::all();
        $courses = Course::where('college_id', $this->college_id)->get();
        return view('livewire.borrower.borrower-form', [
            'sexes' => $sexes,
            'colleges' => $colleges,
            'courses' => $courses,
            'positions' => $positions
        ]);
    }
}
