<?php

namespace App\Http\Livewire\Part;

use App\Models\Part;
use App\Models\Tool;
use Livewire\Component;

class PartForm extends Component
{
    public $partId, $name, $price, $tool_id, $brand, $property_number;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'partId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function partId($partId)
    {
        $this->partId = $partId;
        $part = Part::whereId($partId)->first();
        $this->name = $part->name;
        $this->property_number = $part->property_number;
        $this->brand = $part->brand;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'name' => 'required',
            'brand' => 'required',
            'property_number' => 'required',
            'price' => 'nullable',
            'tool_id' => 'nullable',
        ]);

        $data['price'] = 1;
        // Determine the status_id based on tool_id
        if ($this->tool_id) {
            $data['status_id'] = 20;
        } else {
            $data['status_id'] = 25;
        }

        if ($this->partId) {
            Part::whereId($this->partId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Part::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closePartModal');
        $this->emit('refreshParentPart');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $tools = Tool::all();
        return view('livewire.part.part-form', [
            'tools' => $tools,
        ]);
    }
}
