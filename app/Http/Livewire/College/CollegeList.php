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
        College::destroy($collegeId);

        $action = 'error';
        $message = 'Successfully Deleted';

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
