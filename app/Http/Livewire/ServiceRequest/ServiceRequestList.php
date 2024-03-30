<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\Tool;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceRequest;

class ServiceRequestList extends Component
{
    use withPagination;
    public $serviceRequestId, $tool_id;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'refreshParentServiceRequest' => '$refresh',
        'refreshParentASRO' => '$refresh',
        'refreshParentRequestStart' => '$refresh',
        'refreshParentSReturn' => '$refresh',
        'deleteServiceRequest',
        'editServiceRequest',
        'deleteConfirmServiceRequest'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createServiceRequest()
    {
        $this->emit('resetInputFields');
        $this->emit('openServiceRequestModal');
    }
    public function serviceRequestStart($serviceRequestId)
    {
        $this->serviceRequestId = $serviceRequestId;
        $this->emit('serviceRequestId', $this->serviceRequestId);
        $this->emit('openServiceRequestStartModal');
    }
    public function returnSRequest($serviceRequestId)
    {
        //dd($serviceRequestId);
        $this->serviceRequestId = $serviceRequestId;
        $this->emit('returnId', $this->serviceRequestId);
        $this->emit('openSReturnModal');
    }

    public function editServiceRequest($serviceRequestId)
    {
        $this->serviceRequestId = $serviceRequestId;
        $this->emit('serviceRequestId', $this->serviceRequestId);
        $this->emit('openServiceRequestModal');
    }

    // public function createAssignSROperator()
    // {
    //     //dd('a');
    //     $this->emit('resetInputFields');
    //     $this->emit('openAssignSROperatorModal');
    // }

    public function createAssignSROperator($serviceRequestId)
    {
        $this->serviceRequestId = $serviceRequestId;
        $this->emit('serviceRequestId', $this->serviceRequestId);
        $this->emit('openAssignSROperatorModal');
    }

    public function deleteServiceRequest($serviceRequestId)
    {
        ServiceRequest::destroy($serviceRequestId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $service_requests = ServiceRequest::paginate($this->perPage);
        } else {
            $service_requests = ServiceRequest::where('borrower_id', 'LIKE', '%' . $this->search . '%')
                ->paginate($this->perPage);
        }
    

        return view('livewire.service-request.service-request-list', [
            'service_requests' => $service_requests,
        ]);
    }
}
