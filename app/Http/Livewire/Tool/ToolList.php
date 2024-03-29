<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use App\Models\Source;
use Livewire\Component;
use Livewire\WithPagination;

class ToolList extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $toolId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
    public $source_id = '';
    protected $listeners = [
        'refreshParentTool' => '$refresh',
        //'refreshToolList' => 'refreshToolList',
        'deleteTool',
        'editTool',
        'deleteConfirmTool',
        //'echo:tool-list-channel,ToolListUpdated' => 'refreshComponent',
        'App\Http\Livewire\Request\RequestForm@refreshToolList' => '$refresh',
        //'echo:tool-list-channel,ToolListUpdated' => 'refreshComponent',
    ];

    public function refreshToolList()
    {
        $this->emit('refreshTable'); // Emit event to refresh table
    }
    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function viewTool($toolId)
    {
        //dd($toolId);
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
    
        if (!empty($this->source_id)) {
            $query->where('source_id', $this->source_id);
        }
    
        $tools = $query->paginate($this->perPage);
        $sources = Source::all();
    
        return view('livewire.Tool.Tool-list', [
            'tools' => $tools,
            'sources' => $sources,
        ]);
    }
}
