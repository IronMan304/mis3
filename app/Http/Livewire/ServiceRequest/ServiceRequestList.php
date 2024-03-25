<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\ServiceRequest;
use Livewire\Component;

class ServiceRequestList extends Component
{
    public $serviceId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentService' => '$refresh',
        'deleteService',
        'editService',
        'deleteConfirmService'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createService()
    {
        $this->emit('resetInputFields');
        $this->emit('openServiceModal');
    }

    public function editService($serviceId)
    {
        $this->serviceId = $serviceId;
        $this->emit('serviceId', $this->serviceId);
        $this->emit('openServiceModal');
    }

    public function deleteService($serviceId)
    {
        Service::destroy($serviceId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $services  = Service::all();
        } else {
            $services  = Service::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.service.service-list', [
            'services' => $services
        ]);
    }
}
