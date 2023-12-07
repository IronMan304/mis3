<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
use Livewire\Component;

class StatusForm extends Component
{
    public $statusId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'statusId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function statusId($statusId)
    {
        $this->statusId = $statusId;
        $status = Status::whereId($statusId)->first();
        $this->description = $status->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->statusId) {
            Status::whereId($this->statusId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Status::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeStatusModal');
        $this->emit('refreshParentStatus');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.status.status-form');
    }
}
