<?php

namespace App\Http\Livewire\ServiceRequest;

use App\Models\ServiceRequest;
use Livewire\Component;

class ServiceRequestForm extends Component
{
    public $serviceRequestId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'serviceRequestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function serviceRequestId($serviceRequestId)
    {
        $this->serviceRequestId = $serviceRequestId;
        $service = Service::whereId($serviceRequestId)->first();
        $this->description = $service->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->serviceRequestId) {
            Service::whereId($this->serviceRequestId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Service::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeServiceModal');
        $this->emit('refreshParentService');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.service.service-form');
    }
}
