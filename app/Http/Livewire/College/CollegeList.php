<?php

namespace App\Http\Livewire\College;

use App\Models\College;
use Livewire\Component;

class CollegeList extends Component
{
    public $collegeId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentCollege' => '$refresh',
        'deleteCollege',
        'editCollege',
        'deleteConfirmCollege'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createCollege()
    {
        $this->emit('resetInputFields');
        $this->emit('openCollegeModal');
    }

    public function editCollege($collegeId)
    {
        $this->collegeId = $collegeId;
        $this->emit('collegeId', $this->collegeId);
        $this->emit('openCollegeModal');
    }

    public function deleteCollege($collegeId)
    {
        $college = College::find($collegeId);

        if (!$college) {
            $action = 'error';
            $message = 'College not found';
            $description = ''; // No description available if sex is not found
        } else {
            $description = $college->description; // Store the description before deletion
            $code = $college->code;
            $college->delete();
            $action = 'delete';
            $message = 'Successfully Deleted';
        }

        // Log the activity
        activity()
            ->performedOn($college ?? null) // Pass$college if it exists, otherwise pass null
            ->event($action)
            ->withProperties([
                // 'action' => $action,
                'deleted_description' => $description, // Pass the description as an additional property
                'deleted_code' => $code,
            ])
            ->log(auth()->user()->first_name . ' ' . $action . 'd ' . $description);

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $colleges  = College::all();
        } else {
            $colleges  = College::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.college.college-list', [
            'colleges' => $colleges
        ]);
    }
}
