<?php

namespace App\Http\Livewire\Service;

use App\Models\Service;
use Livewire\Component;

class ServiceForm extends Component
{
    public $serviceId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'serviceId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function serviceId($serviceId)
    {
        $this->serviceId = $serviceId;
        $service = Service::whereId($serviceId)->first();
        $this->description = $service->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->serviceId) {
            Service::whereId($this->serviceId)->first()->update($data);
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
