<?php

namespace App\Http\Livewire\Operator;

use App\Models\Operator;
use Livewire\Component;
use Livewire\WithPagination;

class OperatorList extends Component
{
    use withPagination;
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';
    public $operatorId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentOperator' => '$refresh',
        'refreshParentOperatorAccount' => '$refresh',
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
    public function createOperatorAccount($operatorId)
    {
        $this->operatorId = $operatorId;
        $this->emit('resetInputFields');
        $this->emit('operatorId', $this->operatorId);
        $this->emit('openOperatorAccountModal');
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
            $operators  = Operator::paginate($this->perPage);
        } else {
            $operators  = Operator::where(function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
            })->paginate($this->perPage);;
        }
        return view('livewire.operator.operator-list', [
            'operators' => $operators
        ]);
    }
}
