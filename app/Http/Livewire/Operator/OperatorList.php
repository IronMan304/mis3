<?php

namespace App\Http\Livewire\Operator;

use App\Models\Operator;
use Livewire\Component;

class OperatorList extends Component
{
    public $operatorId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentOperator' => '$refresh',
        'deleteOperator',
        'editOperator',
        'deleteConfirmOperator'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createOperator()
    {
        $this->emit('resetInputFields');
        $this->emit('openOperatorModal');
    }

    public function editOperator($operatorId)
    {
        $this->operatorId = $operatorId;
        $this->emit('operatorId', $this->operatorId);
        $this->emit('openOperatorModal');
    }

    public function deleteOperator($operatorId)
    {
        Operator::destroy($operatorId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $operators  = Operator::all();
        } else {
            $operators  = Operator::where(function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
            })->get();
        }
        return view('livewire.operator.operator-list', [
            'operators' => $operators
        ]);
    }
}
