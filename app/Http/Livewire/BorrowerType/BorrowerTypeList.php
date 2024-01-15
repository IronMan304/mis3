<?php

namespace App\Http\Livewire\BorrowerType;

use App\Models\BorrowerType;
use Livewire\Component;

class BorrowerTypeList extends Component
{
    public $borrowerTypeId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentBorrowerType' => '$refresh',
        'deleteBorrowerType',
        'editBorrowerType',
        'deleteConfirmBorrowerType'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createBorrowerType()
    {
        $this->emit('resetInputFields');
        $this->emit('openBorrowerTypeModal');
    }

    public function editBorrowerType($borrowerTypeId)
    {
        $this->borrowerTypeId = $borrowerTypeId;
        $this->emit('borrowerTypeId', $this->borrowerTypeId);
        $this->emit('openBorrowerTypeModal');
    }

    public function deleteBorrowerType($borrowerTypeId)
    {
        BorrowerType::destroy($borrowerTypeId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }
    public function render()
    {
        if (empty($this->search)) {
            $borrowerTypes  = BorrowerType::all();
        } else {
            $borrowerTypes  = BorrowerType::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.borrower-type.borrower-type-list', [
            'borrowerTypes' => $borrowerTypes
        ]);
    }
}
