<?php

namespace App\Http\Livewire\Type;

use App\Models\Tool;
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

    public function getTotalToolCount()
    {
        // Retrieve all tools with status_id 1 (In Stock) across all types
        $totalToolCount = Tool::count();

        return $totalToolCount;
    }

    public function getTotalInStockCount()
    {
        // Retrieve all tools with status_id 1 (In Stock) across all types
        $totalInStockCount = Tool::where('status_id', 1)->count();

        return $totalInStockCount;
    }
    public function getTotalInUseCount()
    {
        // Retrieve the total count of tools with status_id 2 (In Use)
        $totalInUseCount = Tool::where('status_id', 2)->count();

        return $totalInUseCount;
    }

    public function getTotalDamagedCount()
    {
        // Retrieve the total count of tools with status_id 4 (Damaged)
        $totalDamagedCount = Tool::where('status_id', 4)->count();

        return $totalDamagedCount;
    }

    public function getTotalLostCount()
    {
        // Retrieve the total count of tools with status_id 3 (Lost)
        $totalLostCount = Tool::where('status_id', 3)->count();

        return $totalLostCount;
    }


    public function render()
    {
        if (empty($this->search)) {
            $types  = Type::all();
        } else {
            $types  = Type::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.Type.Type-list', [
            'types' => $types,
            'totalToolCount' => $this->getTotalToolCount(),
            'totalInStockCount' => $this->getTotalInStockCount(),
            'totalInUseCount' => $this->getTotalInUseCount(),
            'totalDamagedCount' => $this->getTotalDamagedCount(),
            'totalLostCount' => $this->getTotalLostCount(),
        ]);
    }
}
