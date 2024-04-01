<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use App\Models\Type;
use App\Models\Source;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class ToolList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $toolId;
    public $search = '';
    public $action = '';
    public $message = '';
    public $type_id = '0';
    public $status_id = '0';
    public $source_id = '0';
    public $selectedFilters = [];

    protected $listeners = [
        'refreshParentTool' => '$refresh',
        'deleteTool',
        'editTool',
        'deleteConfirmTool',
        'refreshTable',
    ];

    public function refreshTable()
    {
        $this->render();
    }

    public function applyFilters()
    {
        $this->resetPage(); // Reset pagination when applying filters
        $this->render(); // Render the component to apply new filters
    }
    public function resetFilters()
{
    $this->reset(['type_id', 'status_id', 'source_id']);
    $this->search = ''; // Also reset search input
    $this->resetPage(); // Reset pagination
    $this->render(); // Render the component
}


    public function viewTool($toolId)
    {
        $this->toolId = $toolId;
        $this->emit('toolId', $this->toolId);
        $this->emit('openToolViewModal');
    }

    public function createTool()
    {
        $this->emit('resetInputFields');
        $this->emit('openToolModal');
    }

    public function editTool($toolId)
    {
        $this->toolId = $toolId;
        $this->emit('toolId', $this->toolId);
        $this->emit('openToolModal');
    }

    public function deleteTool($toolId)
    {
        Tool::destroy($toolId);
        $action = 'error';
        $message = 'Successfully Deleted';
        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        $query = Tool::query();

        if (!empty($this->search)) {
            $query->where('brand', 'LIKE', '%' . $this->search . '%')
                ->orWhere('property_number', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('type', function ($query) {
                    $query->where('description', 'LIKE', '%' . $this->search . '%');
                });
        }

        if (!empty($this->type_id)) {
            $query->where('type_id', $this->type_id);
        }

        if (!empty($this->status_id)) {
            $query->where('status_id', $this->status_id);
        }

        if (!empty($this->source_id)) {
            $query->where('source_id', $this->source_id);
        }

        $tools = $query->paginate($this->perPage);
        $sources = Source::all();
        $types = Type::all();
        $statuses = Status::all();

        return view('livewire.Tool.Tool-list', [
            'tools' => $tools,
            'sources' => $sources,
            'types' => $types,
            'statuses' => $statuses,
        ]);
    }
}
