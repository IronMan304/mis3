<?php

namespace App\Http\Livewire\Part;

use App\Models\Part;
use Livewire\Component;

class PartList extends Component
{
    public $partId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentPart' => '$refresh',
        'deletePart',
        'editPart',
        'deleteConfirmPart'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createPart()
    {
        $this->emit('resetInputFields');
        $this->emit('openPartModal');
    }

    public function editPart($partId)
    {
        $this->partId = $partId;
        $this->emit('partId', $this->partId);
        $this->emit('openPartModal');
    }

    public function deletePart($partId)
    {
        Part::destroy($partId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $parts  = Part::all();
        } else {
            $parts  = Part::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.part.part-list', [
            'parts' => $parts
        ]);
    }
}
