<?php

namespace App\Http\Livewire\Request;

use App\Models\Request;
use Livewire\Component;

class RequestList1 extends Component
{
    public $requestId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

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

    public function render()
    {
        $requests = Request::with(['borrower' => function ($query) {
            $query->where('first_name', 'LIKE', '%' . $this->search . '%');
        }])
        ->where(function ($query) {
            $query->where('request_number', 'LIKE', '%' . $this->search . '%')
                  ->orWhereHas('borrower', function ($query) {
                      $query->where('first_name', 'LIKE', '%' . $this->search . '%');
                  });
        })
        ->get();
    
        return view('livewire.request.request-list1', [
            'requests' => $requests
        ]);
    }
    
}
