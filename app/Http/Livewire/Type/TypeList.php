<?php

namespace App\Http\Livewire\Type;

use App\Models\Type;
use Livewire\Component;

class TypeList extends Component
{
    public $typeId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentType' => '$refresh',
        'deleteType',
        'editType',
        'deleteConfirmType'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createType()
    {
        $this->emit('resetInputFields');
        $this->emit('openTypeModal');
    }

    public function editType($typeId)
    {
        $this->typeId = $typeId;
        $this->emit('typeId', $this->typeId);
        $this->emit('openTypeModal');
    }

    public function deleteType($typeId)
    {
        Type::destroy($typeId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $types  = Type::all();
        } else {
            $types  = Type::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.Type.Type-list', [
            'types' => $types
        ]);
    }
}
