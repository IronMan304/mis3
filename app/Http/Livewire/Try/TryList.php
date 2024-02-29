<?php

namespace App\Http\Livewire\Try;

use App\Models\Try;
use Livewire\Component;

class TryList extends Component
{
    public $tryId;
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

    public function editSex($tryId)
    {
        $this->tryId = $tryId;
        $this->emit('tryId', $this->tryId);
        $this->emit('openSexModal');
    }

    public function deleteSex($tryId)
    {
        Sex::destroy($tryId);

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
