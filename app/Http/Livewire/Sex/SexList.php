<?php

namespace App\Http\Livewire\Sex;

use App\Models\Sex;
use Livewire\Component;

class SexList extends Component
{
    public $sexId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentSex' => '$refresh',
        'deleteSex',
        'editSex',
        'deleteConfirmSex'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createSex()
    {
        $this->emit('resetInputFields');
        $this->emit('openSexModal');
    }

    public function editSex($sexId)
    {
        $this->sexId = $sexId;
        $this->emit('sexId', $this->sexId);
        $this->emit('openSexModal');
    }

    public function deleteSex($sexId)
    {
        Sex::destroy($sexId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $sexes  = Sex::all();
        } else {
            $sexes  = Sex::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.sex.sex-list', [
            'sexes' => $sexes
        ]);
    }
}
