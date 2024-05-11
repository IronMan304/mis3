<?php

namespace App\Http\Livewire\ServiceRequest;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Type;
use App\Models\User;
use App\Models\Source;
use App\Models\Status;
use App\Models\Request;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Category;
use App\Models\Operator;
use Livewire\WithPagination;
use App\Models\ServiceRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportList extends Component
{
    use withPagination;
    public $exporting = false;
    public $serviceRequestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';
    public $stype_id = '';
    public $sdateFrom;
    public $sdateTo;
    public $sdate;
    public $sborrower_id, $scategory_id, $stool_type_id, $stool_id, $soperator_id, $sstatus_id, $source_id, $technician_id;

    protected $listeners = [
        'refreshParentServiceRequest' => '$refresh',
        'deleteServiceRequest',
        'editServiceRequest',
        'deleteConfirmServiceRequest'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function mount()
    {
        // $this->sdateFrom = now()->tosDateString();
        // $this->sdateTo = now()->tosDateString();
        // Set default sdate range to include all sdates
        // $this->sdateFrom = null;
        // $this->sdate = null;
        // $this->sdateTo = null;
    }
    public function resetFilters()
    {
        $this->reset(['stool_type_id', 'sborrower_id', 'scategory_id', 'stype_id', 'stool_id', 'soperator_id', 'sstatus_id', 'source_id', 'technician_id']);
        $this->sdateFrom = null;
        $this->sdate = null;
        $this->sdateTo = null;
        $this->search = ''; // Also reset search input
        $this->resetPage(); // Reset pagination
        $this->render(); // Render the component
    }

    public function createServiceRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openServiceRequestModal');
    }

    public function editServiceRequest($serviceRequestId)
    {
        $this->serviceRequestId = $serviceRequestId;
        $this->emit('serviceRequestId', $this->serviceRequestId);
        $this->emit('openServiceRequestModal');
    }

    public function deleteServiceRequest($serviceRequestId)
    {
        ServiceRequest::destroy($serviceRequestId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }
    public function applyFilters()
    {
        // Reset pagination when applying filters
        $this->resetPage();

        // Render the component to apply new filters
        $this->render();
    }


    public function render()
    {
        // Base query to get all requests
        $query = ServiceRequest::with('borrower.user');

        if (!empty($this->sstatus_id)) {
            $query->where('status_id', $this->sstatus_id);
        }
        // if (!empty($this->source_id)) {
        //     $query->whereHas('tool', function ($query) {
        //         $query->where('source_id', $this->source_id);
        //     });
        // }
        if (!empty($this->source_id)) {
            $query->where('source_id', $this->source_id);
        }
        if (!empty($this->scategory_id)) {
            $query->whereHas('tool', function ($query) {
                $query->whereHas('type', function ($query) {
                    $query->where('category_id', $this->scategory_id);
                });
            });
        }

        if (!empty($this->stool_type_id)) {
            $query->whereHas('tool', function ($query) {
                $query->where('type_id', $this->stool_type_id);
            });
        }

        if (!empty($this->stool_id)) {
            $query->where('tool_id', $this->stool_id);
        }

        if (!empty($this->sborrower_id)) {
            $query->where('borrower_id', $this->sborrower_id);
        }

        if (!empty($this->soperator_id)) {
            $query->where('operator_id', $this->soperator_id);
        }
        if (!empty($this->technician_id)) {
            $query->where('technician_id', $this->technician_id);
        }

        // Filter requests based on sdate range if sdates are selected
        if ($this->sdateFrom && $this->sdateTo) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->sdateFrom)->startOfDay(),
                Carbon::parse($this->sdateTo)->endOfDay()
            ]);
        } elseif ($this->sdate) {
            $query->wheresDate('created_at', Carbon::parse($this->sdate)->tosDateString());
        }

        // Apply type filter if selected
        if ($this->stype_id === 'mobile') {
            $query->whereHas('borrower', function ($query) {
                $query->whereColumn('user_id', 'service_requests.staff_user_id');
            });
        } elseif ($this->stype_id === 'ftof') {
            $query->whereHas('borrower', function ($query) {
                $query->whereColumn('user_id', '!=', 'service_requests.staff_user_id');
            });
        }

        // Filter requests based on search query
        if (!empty($this->search)) {
            $query->whereHas('borrower', function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
            })
                ->orWhereHas('tool', function ($query) {
                    $query->where('property_number', 'LIKE', '%' . $this->search . '%');
                });
        }

        // Paginate the filtered requests
        $requests = $query->paginate($this->perPage);
        $borrowers = Borrower::all();
        $operators = Operator::all();
        $technicians = User::role('technician')->get();
        $categories = Category::all();
        $types = Type::all();
        $tools = Tool::all();
        $statuses = Status::all();
        $sources = Source::all();

        // Render the Livewire component
        return view('livewire.service-request.report-list', [
            'requests' => $requests,
            'borrowers' => $borrowers,
            'operators' => $operators,
            'technicians' => $technicians,
            'categories' => $categories,
            'types' => $types,
            'tools' => $tools,
            'statuses' => $statuses,
            'sources' => $sources,
        ]);
    }

    public function exportToPdf()
    {
        $this->exporting = true;

        // Base query to get all requests
        $query = ServiceRequest::with('borrower.user');

        if (!empty($this->sstatus_id)) {
            $query->where('status_id', $this->sstatus_id);
        }
        // if (!empty($this->source_id)) {
        //     $query->whereHas('tool', function ($query) {
        //         $query->where('source_id', $this->source_id);
        //     });
        // }
        if (!empty($this->source_id)) {
            $query->where('source_id', $this->source_id);
        }
        if (!empty($this->scategory_id)) {
            $query->whereHas('tool', function ($query) {
                $query->whereHas('type', function ($query) {
                    $query->where('category_id', $this->scategory_id);
                });
            });
        }

        if (!empty($this->stool_type_id)) {
            $query->whereHas('tool', function ($query) {
                $query->where('type_id', $this->stool_type_id);
            });
        }

        if (!empty($this->stool_id)) {
            $query->where('tool_id', $this->stool_id);
        }

        if (!empty($this->sborrower_id)) {
            $query->where('borrower_id', $this->sborrower_id);
        }

        if (!empty($this->soperator_id)) {
            $query->where('operator_id', $this->soperator_id);
        }
        if (!empty($this->technician_id)) {
            $query->where('technician_id', $this->technician_id);
        }

        // Filter requests based on sdate range if sdates are selected
        if ($this->sdateFrom && $this->sdateTo) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->sdateFrom)->startOfDay(),
                Carbon::parse($this->sdateTo)->endOfDay()
            ]);
        } elseif ($this->sdate) {
            $query->wheresDate('created_at', Carbon::parse($this->sdate)->tosDateString());
        }

        // Apply type filter if selected
        if ($this->stype_id === 'mobile') {
            $query->whereHas('borrower', function ($query) {
                $query->whereColumn('user_id', 'service_requests.staff_user_id');
            });
        } elseif ($this->stype_id === 'ftof') {
            $query->whereHas('borrower', function ($query) {
                $query->whereColumn('user_id', '!=', 'service_requests.staff_user_id');
            });
        }

        // Filter requests based on search query
        if (!empty($this->search)) {
            $query->whereHas('borrower', function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
            })
                ->orWhereHas('tool', function ($query) {
                    $query->where('property_number', 'LIKE', '%' . $this->search . '%');
                });
        }

        // Paginate the filtered requests
        $requests = $query->get();
        // Load the view and generate the PDF
        $pdf = pdf::loadView('livewire.service-request.export-pdf', [
            'requests' => $requests,
        ]);

        // Set the filename
        $filename = 'equipment-request-report.pdf';
        $this->exporting = false;

        // Stream or download the PDF
        //return $pdf->download($filename);
        return response()->streamDownload(
            fn () => print($pdf->output()),
            $filename
        );
    }
}
