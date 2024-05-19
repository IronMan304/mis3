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
use App\Models\ToolRequest;
use App\Models\ToolSecurity;
use Livewire\WithPagination;
use App\Models\RequestToolToolSecurityKey;

class RequestList extends Component
{
    use withPagination;
    public $requestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
    public $isApproved = false;
    public $toolItems = [];
    public $securityButton = false;
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';
    public $type_id = '';
    public $dateFrom;
    public $dateTo;
    public $date;
    public $borrower_id, $category_id, $tool_type_id, $tool_id, $operator_id, $status_id, $operator1_id;

    protected $listeners = [
        'refreshParentRequest' => '$refresh',
        'refreshParentReturn' => '$refresh',
        'refreshParentApproval' => '$refresh',
        'refreshParentSecurityApproval' => '$refresh',
        'refreshParentRequestStartForm' => '$refresh',
        'refreshParentCancelRequest' => '$refresh',
        'deleteRequest',
        'editRequest',
        'deleteConfirmRequest',
        'cancelRequest' => 'handleCancelRequest',
        'approveBooking',
        'borrowerId'
    ];

    public function resetFilters()
    {
        $this->reset(['tool_type_id', 'borrower_id', 'category_id', 'type_id', 'tool_id', 'operator_id', 'status_id']);
        $this->dateFrom = null;
        $this->date = null;
        $this->dateTo = null;
        $this->search = ''; // Also reset search input
        $this->resetPage(); // Reset pagination
        $this->render(); // Render the component
    }
    public function applyFilters()
    {
        // Reset pagination when applying filters
        $this->resetPage();

        // Render the component to apply new filters
        $this->render();
    }

    // public function mount()
    // {
    //     //$this->requestId = $requestId;

    //     // Fetch the request model along with its related tool_keys and tools
    //     $request = Request::with('tool_keys.tools')->find($this->requestId);
    //     if ($request) {
    //         $this->toolItems = $request->tool_keys->pluck('tool_id')->toArray();

    //         // Assuming you have fetched the current user
    //         $userPositionId = auth()->user()->position_id;

    //         // Check if the user's position matches any of the security_ids for the tools
    //         foreach ($this->toolItems as $toolId) {

    //             // Assuming you have fetched the current user and the tool
    //             $userPositionId = auth()->user()->position_id;
    //             $toolSecurityIds = ToolSecurity::where('tool_id', $toolId)->pluck('security_id')->toArray();

    //             //$securityButton = false;

    //             foreach ($toolSecurityIds as $securityId) {
    //             if ($userPositionId == $securityId) {
    //             // If position_id matches any of the security_id, set securityButton to true
    //             $this->securityButton = true;
    //             break;
    //             }
    //             }
    //             }
             
    //     }
    
    // }

    // public function approveRequest($requestId)
    // {
    //     $request = Request::find($requestId);

    //     if ($request) {
    //         if ($request->status_id != 2) {
    //             $request->update(['status_id' => 10]); // Update the status to "Approved"
    //             $action = 'edit';
    //             $message = 'Request Approved';
    //             $this->emit('flashAction', $action, $message);
    //         }
    //     }

    //     // $this->resetPage();
    // }

    public function securityApprovalForm($requestId)
    {
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openSecurityApprovalModal');
    }

    public function requestStartForm($requestId)
    {
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openRequestStartFormModal');
    }
    public function handleCancelRequest($requestId)
    {
        // Retrieve tool items associated with the request
        $toolItems = Request::find($requestId)->tool_keys->pluck('tool_id')->toArray();

        if ($requestId) {
            // Handle the cancellation logic here
            Request::where('id', $requestId)->update(['status_id' => 8]);


            // Assuming you want to update the status of associated tools
            Tool::whereIn('id', $toolItems)->update(['status_id' => 1]);

            // Update the status_id of each ToolRequest
            ToolRequest::where('request_id', $requestId)->update(['status_id' => 8]);

            $action = 'cancel';
            $message = 'Request Cancelled';

            $this->emit('flashAction', $action, $message);
            $this->emit('refreshTable');
        }
    }

    public function updatingSearch()
    {
        $this->emit('refreshTable');
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

    public function viewRequestTool($requestId)
    {
        //dd($requestId);
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openRequestToolViewModal');
    }
    public function returnRequest($requestId)
    {
        //dd($requestId);
        $this->requestId = $requestId;
        $this->emit('returnId', $this->requestId);
        $this->emit('openReturnModal');
    }

    public function approvalRequest($requestId)
    {
        //dd($requestId);
        $this->requestId = $requestId;
        $this->emit('approvalId', $this->requestId);
        $this->emit('openApprovalModal');
    }
    public function deleteRequest($requestId)
    {
        Request::destroy($requestId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    // public function cancelRequest($requestId)
    // {
    //     if ($requestId) {
    //         // If it's an existing request, update the status to 'Cancelled' (assuming 8 represents 'Cancelled')
    //         Request::where('id', $requestId)->update(['status_id' => 8]);

    //         // Update the tool status to 'Available' (assuming 1 represents 'In Stock') for the associated tools
    //         Tool::whereIn('id', $this->toolItems)->update(['status_id' => 1]);

    //         $action = 'cancel';
    //         $message = 'Request Cancelled';
    //     }


    //     // $action = 'error';
    //     // $message = 'Successfully Deleted';

    //     $this->emit('flashAction', $action, $message);
    //     $this->emit('refreshTable');
    // }

    public function cancelRequest($requestId)
    {
        $this->requestId = $requestId;
        $this->emit('requestId', $this->requestId);
        $this->emit('openCancelRequestModal');
    }

    public function render()
    {

         // Base query to get all requests
         $query = Request::with('borrower.user');

         if (!empty($this->borrower_id)) {
             $query->where('borrower_id', $this->borrower_id);
         }
         if (!empty($this->operator_id)) {
             $query->whereHas('request_operator_keys', function ($query) {
                 $query->where('operator_id', $this->operator_id);
             });
         }

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
                     ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                     ->orWhere('id_number', 'LIKE', '%' . $this->search . '%');
             })
                 ->orWhereHas('tool_keys', function ($query) {
                     $query->whereHas('tools', function ($query) {
                         $query->where('property_number', 'LIKE', '%' . $this->search . '%');
                     });
                 });
                    // Paginate the filtered requests
        // $requests = $query->paginate($this->perPage);
         $requests = $query->orderBy('id', 'desc')->paginate($this->perPage);
         }
         else {
            $requests = [];
        }
       // $requests = $query->orderBy('id', 'desc')->paginate($this->perPage);
         $borrowers = Borrower::all();
         //$operators = Operator::all();
         $operators = User::role('operator')->get();
         $categories = Category::all();
         $types = Type::all();
         $tools = Tool::all();
         $statuses = Status::all();
        
        
        $tool_requests = ToolRequest::all();
        $toolSecurities = ToolSecurity::all();
        $rTTSK = RequestToolToolSecurityKey::all();

        //dd($securityButton);

        return view('livewire.request.request-list', [
            'requests' => $requests,
            'borrowers' => $borrowers,
            'operators' => $operators,
            'categories' => $categories,
            'types' => $types,
            'tools' => $tools,
            'statuses' => $statuses,
            'tool_requests' => $tool_requests,
            'toolSecurities' => $toolSecurities,
            'rTTSK' => $rTTSK,
            //'securityButton' => $securityButton,
        ]);
    }
}
