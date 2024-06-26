<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use Livewire\Component;
use App\Models\ToolRequest;
use Livewire\WithPagination;
use App\Models\ServiceRequest;

class ToolLog extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $toolId;
    public $action = '';  //flash
    public $message = '';  //flash
    // Separate pagination state variables for toolRequests and serviceRequests
    public $tab = true;

    protected $listeners = [
        'toolId',
        //'resetInputFields',
    ];
     public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function closeModal()
    {
        $this->emit('modalClosed');
    }
    public function closeToolLog()
    {
        //$this->emit('resetInputFields');
        $this->emit('closeToolLogModal');
    }

    // public function eToolLog()
    // {
      
    // }

    // public function sToolLog()
    // {
   
    // }

    // public function resetInputFields()
    // {
    //     $this->reset();
    //     $this->resetValidation();
    //     $this->resetErrorBag();
    // }

    //edit
    public function toolId($toolId)
    {
        $this->toolId = $toolId;
        $tool = ToolRequest::whereId($toolId)->first();
        //$this->description = $tool->description;
    }

    public function render()
    {
        $toolRequests = ToolRequest::where('tool_id', $this->toolId)->paginate($this->perPage, ['*'], 'toolPage');
        $serviceRequests = ServiceRequest::where('tool_id', $this->toolId)->paginate($this->perPage);
        return view('livewire.tool.tool-log', [
            'toolRequests' => $toolRequests,
            'serviceRequests' => $serviceRequests,
        ]);
    }
}
