<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\College;
use Livewire\Component;

class CourseForm extends Component
{
    public $courseId, $college_id, $description, $code;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'courseId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function courseId($courseId)
    {
        $this->courseId = $courseId;
        $course = Course::whereId($courseId)->first();
        $this->description = $course->description;
        $this->code = $course->code;
        $this->college_id = $course->college_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
            'code' => 'required',
            'college_id' => 'required'
        ]);

        if ($this->courseId) {
            Course::whereId($this->courseId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Course::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeCourseModal');
        $this->emit('refreshParentCourse');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $colleges = College::all();
        return view('livewire.course.course-form', [
            'colleges' => $colleges
        ]);
    }
}
