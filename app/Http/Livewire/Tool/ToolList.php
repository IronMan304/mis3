<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use App\Models\Type;
use App\Models\Source;
use App\Models\Status;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Position;
use App\Models\ToolRequest;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;

class ToolList extends Component
{
    use WithPagination;
    public $exporting = false;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $toolId;
    public $search = '';
    public $action = '';
    public $message = '';
    public $type_id = '0';
    public $status_id = '0';
    public $source_id = '0';
    public $applicability_id = '0';
    public $security_id = '0';
    public $owner_id = '0';
    public $requests = [];
    public $paginationReset = false;


    protected $listeners = [
        'refreshParentTool' => '$refresh',
        'deleteTool',
        'editTool',
        'deleteConfirmTool',
        'refreshTable',
        'refreshPage' => 'refreshPageHandler',
        //'logClose' => '$refresh'
        'parentSwitchToolLogModal' => '$refresh',
    ];
    public function resetPagination()
    {
        $this->emit('refreshParentTool');
    }

    public function refreshTable()
    {
        $this->render();
    }
    public function refreshPageHandler()
    {
        // No action needed here as we are refreshing the page using JavaScript
    }
    public function refreshPage()
    {
        $this->emit('refreshPage');
    }


    public function applyFilters()
    {
        $this->resetPage(); // Reset pagination when applying filters
        $this->render(); // Render the component to apply new filters
    }
    public function resetFilters()
    {
        $this->reset(['type_id', 'status_id', 'source_id', 'applicability_id', 'security_id', 'owner_id']);
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

    public function toolLog($toolId)
    {
        $this->toolId = $toolId;
        $this->emit('toolId', $this->toolId);
        $this->emit('openToolLogModal');
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
                ->orWhere('property_number', 'LIKE', '%' . $this->search . '%');
        }

        if (!empty($this->owner_id)) {
            $query->where('owner_id', $this->owner_id);
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

        if (!empty($this->applicability_id)) {
            $query
                ->whereHas('position_keys', function ($query) {
                    $query->where('position_id', 'LIKE', '%' . $this->applicability_id . '%');
                });
        }

        if (!empty($this->security_id)) {
            $query
                ->whereHas('security_keys', function ($query) {
                    $query->where('security_id', 'LIKE', '%' . $this->security_id . '%');
                });
        }

        // // Retrieve the tools only if there's a search query or at least one filter applied
        // if (!empty($this->search) || !empty($this->owner_id) || !empty($this->type_id) || !empty($this->status_id) || !empty($this->source_id) || !empty($this->applicability_id) || !empty($this->security_id)) {
        //     $tools = $query->paginate($this->perPage);
        // } else {
        //     $tools = []; // Empty collection if no search query or filters applied
        // }
        $tools = $query->paginate($this->perPage);
        $sources = Source::all();
        $types = Type::all();
        $statuses = Status::all();
        $applicabilities = Position::all();
        $borrowers = Borrower::all();

        return view('livewire.tool.tool-list', [
            'tools' => $tools,
            'sources' => $sources,
            'types' => $types,
            'statuses' => $statuses,
            'applicabilities' => $applicabilities,
            'borrowers' => $borrowers,
            'paginationReset' => $this->paginationReset,

        ]);
    }

    public function exportToPdf()
    {
        $this->exporting = true;

        $toolsQuery = Tool::query();

        // Apply filters based on the selected options
        if (!empty($this->search)) {
            $toolsQuery->where('brand', 'LIKE', '%' . $this->search . '%')
                ->orWhere('property_number', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('type', function ($query) {
                    $query->where('description', 'LIKE', '%' . $this->search . '%');
                })
                ->orWhereHas('owner', function ($query) {
                    $query->where('first_name', 'LIKE', '%' . $this->search . '%');
                });
        }

        if (!empty($this->owner_id)) {
            $toolsQuery->where('owner_id', $this->owner_id);
        }

        if (!empty($this->type_id)) {
            $toolsQuery->where('type_id', $this->type_id);
        }

        if (!empty($this->status_id)) {
            $toolsQuery->where('status_id', $this->status_id);
        }

        if (!empty($this->source_id)) {
            $toolsQuery->where('source_id', $this->source_id);
        }

        if (!empty($this->applicability_id)) {
            $toolsQuery->whereHas('position_keys', function ($query) {
                $query->where('position_id', 'LIKE', '%' . $this->applicability_id . '%');
            });
        }

        if (!empty($this->security_id)) {
            $toolsQuery->whereHas('security_keys', function ($query) {
                $query->where('security_id', 'LIKE', '%' . $this->security_id . '%');
            });
        }

        $tools = $toolsQuery->get();

        // Load the view and generate the PDF
        $pdf = pdf::loadView('livewire.tool.export-pdf', [
            'tools' => $tools,
        ]);

        // Set the filename
        $filename = 'tool-list.pdf';
        $this->exporting = false;

        // Stream or download the PDF
        //return $pdf->download($filename);
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $filename
        );
    }
}
