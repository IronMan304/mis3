<?php

namespace App\Http\Livewire\Position;

use App\Models\Position;
use Livewire\Component;

class PositionList extends Component
{
    public $positionId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentPosition' => '$refresh',
        'deletePosition',
        'editPosition',
        'deleteConfirmPosition'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createPosition()
    {
        $this->emit('resetInputFields');
        $this->emit('openPositionModal');
    }

    public function editPosition($positionId)
    {
        $this->positionId = $positionId;
        $this->emit('positionId', $this->positionId);
        $this->emit('openPositionModal');
    }

    public function deletePosition($positionId)
    {
        Position::destroy($positionId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $positions  = Position::all();
        } else {
            $positions  = Position::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.position.position-list', [
            'positions' => $positions
        ]);
    }
}
