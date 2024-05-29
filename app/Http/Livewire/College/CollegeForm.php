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
    
        $college = null;
        $formerDescription = null;
        $formerCode = null;
    
        if ($this->collegeId) {
            $college = College::find($this->collegeId);
            if ($college) {
                $formerDescription = $college->description;
                $formerCode = $college->code;
                $college->update($data);
                $action = 'edit';
                $message = 'Successfully Updated';
            }
        } else {
            $college = College::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }
    
        // Log the activity
        $properties = [];
        $logMessage = auth()->user()->first_name . ' ' . $action . 'd college.';
    
        if ($action === 'edit') {
            if ($formerDescription !== $data['description']) {
                $properties['old_description'] = $formerDescription;
                $properties['new_description'] = $data['description'];
                $logMessage .= ' Description: ' . $formerDescription . ' to ' . $data['description'] . '.';
            }
            if ($formerCode !== $data['code']) {
                $properties['old_code'] = $formerCode;
                $properties['new_code'] = $data['code'];
                $logMessage .= ' Code: ' . $formerCode . ' to ' . $data['code'] . '.';
            }
    
            // Only log if there are changes
            if (!empty($properties)) {
                activity()
                    ->performedOn($college)
                    ->withProperties($properties)
                    ->event($action)
                    ->log($logMessage);
            }
        } else if ($action === 'store') {
            $properties['new_description'] = $data['description'];
            $properties['new_code'] = $data['code'];
            $logMessage .= ' Description: ' . $data['description'] . ', Code: ' . $data['code'] . '.';
    
            activity()
                ->performedOn($college)
                ->withProperties($properties)
                ->event($action)
                ->log($logMessage);
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
