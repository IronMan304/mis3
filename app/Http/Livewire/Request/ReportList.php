<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Type;
use App\Models\User;
use App\Models\Status;
use App\Models\Request;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Category;
use App\Models\Operator;
use Livewire\WithPagination;

class ReportList extends Component
{
    use withPagination;
    public $requestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';
    public $type_id = '';
    public $dateFrom;
    public $dateTo;
    public $date;
    public $borrower_id, $category_id, $tool_type_id, $tool_id, $operator_id, $status_id, $operator1_id;
    public $rn;

    protected $listeners = [
        'refreshParentRequest' => '$refresh',
        'deleteRequest',
        'editRequest',
        'deleteConfirmRequest'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function mount()
    {
        // $this->dateFrom = now()->toDateString();
        // $this->dateTo = now()->toDateString();
        // Set default date range to include all dates
        // $this->dateFrom = null;
        // $this->date = null;
        // $this->dateTo = null;
    }
    public function resetFilters()
    {
        $this->reset(['tool_type_id', 'borrower_id', 'category_id', 'type_id', 'tool_id', 'operator_id', 'status_id', 'operator1_id']);
        $this->dateFrom = null;
        $this->date = null;
        $this->dateTo = null;
        $this->search = ''; // Also reset search input
        $this->resetPage(); // Reset pagination
        $this->render(); // Render the component
    }

    public function createRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openRequestModal');
    }

    public function editRequest($requestId)
    {
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openRequestModal');
    }

    public function deleteRequest($requestId)
    {
        Request::destroy($requestId);

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
        $query = Request::with('borrower.user');

        if (!empty($this->borrower_id)) {
            $query->where('borrower_id', $this->borrower_id);
        }
        // if (!empty($this->operator_id)) {
        //     $query->whereHas('request_operator_keys', function ($query) {
        //         $query->where('operator_id', $this->operator_id);
        //     });
        // }

        if (!empty($this->operator1_id)) {
            $query->whereHas('RequestOperatorKey', function ($query) {
                $query->where('operator1_id', $this->operator1_id);
            });
        }
        if (!empty($this->category_id)) {
            $query->whereHas('tool_keys', function ($query) {
                $query->whereHas('tools', function ($query) {
                    $query->whereHas('type', function ($query) {
                        $query->where('category_id', $this->category_id);
                    });
                 
                });
            });
           //$this->reset(['tool_type_id', 'tool_id']);
        }
        if (!empty($this->tool_type_id)) {
            $query->whereHas('tool_keyss', function ($query) {
                $query->whereHas('tools', function ($query) {
                    $query->where('type_id', $this->tool_type_id);
                });
            });
        }
        if (!empty($this->tool_id)) {
            $query
                ->whereHas('tool_keyss', function ($query) {
                    $query->where('tool_id', $this->tool_id);
                });
        }
        if (!empty($this->status_id)) {
            $query->where('status_id', $this->status_id);
        }


        // Filter requests based on date range if dates are selected
        if ($this->dateFrom && $this->dateTo) {
            $query->whereBetween('created_at', [
                Carbon::parse($this->dateFrom)->startOfDay(),
                Carbon::parse($this->dateTo)->endOfDay()
            ]);
          
        } elseif ($this->date) {
            $query->whereDate('created_at', Carbon::parse($this->date)->toDateString());
            // $this->dateFrom = null;
            // $this->dateTo = null;
        }

        // Apply type filter if selected
        if ($this->type_id === 'mobile') {
            $query->whereHas('borrower', function ($query) {
                $query->whereColumn('user_id', 'requests.user_id');
            });
        } elseif ($this->type_id === 'ftof') {
            $query->whereHas('borrower', function ($query) {
                $query->whereColumn('user_id', '!=', 'requests.user_id');
            });
        }



        // Filter requests based on search query
        if (!empty($this->search)) {
            $query->where('request_number', 'LIKE', '%' . $this->search . '%')
            ->orWhereHas('borrower', function ($query) {
                $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
            })
                ->orWhereHas('tool_keys', function ($query) {
                    $query->whereHas('tools', function ($query) {
                        $query->where('property_number', 'LIKE', '%' . $this->search . '%');
                    });
                });
        }

        // Paginate the filtered requests
        $requests = $query->paginate($this->perPage);
        $borrowers = Borrower::all();
        //$operators = Operator::all();
        $operators = User::role('operator')->get();
        $categories = Category::all();
        $types = Type::all();
        $tools = Tool::all();
        $statuses = Status::all();
        

        // Render the Livewire component
        return view('livewire.request.report-list', [
            'requests' => $requests,
            'borrowers' => $borrowers,
            'operators' => $operators,
            'categories' => $categories,
            'types' => $types,
            'tools' => $tools,
            'statuses' => $statuses,
        ]);
    }
}
