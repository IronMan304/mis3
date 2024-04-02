<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use App\Models\Request;
use Livewire\Component;
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
        $this->dateFrom = null;
        //$this->dateTo = null;
        $this->dateTo = now()->endOfDay(); 
    }
    public function resetFilters()
    {
        $this->reset(['type_id', 'dateFrom', 'dateTo']);
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

    // Filter requests based on date range if dates are selected
    if ($this->dateFrom && $this->dateTo) {
        $query->whereBetween('created_at', [
            Carbon::parse($this->dateFrom)->startOfDay(),
            Carbon::parse($this->dateTo)->endOfDay()
        ]);
    }

    // Filter requests based on search query
    if (!empty($this->search)) {
        $query->whereHas('borrower', function ($query){
            $query->where('first_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('middle_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $this->search . '%');
        })
        ->orWhereHas('tool_keys', function ($query){
            $query->whereHas('tools', function ($query){
                $query->where('property_number', 'LIKE', '%' . $this->search . '%');
            });
        });
    }

    // Paginate the filtered requests
    $requests = $query->paginate($this->perPage);

    // Render the Livewire component
    return view('livewire.request.report-list', [
        'requests' => $requests
    ]);
}
}
