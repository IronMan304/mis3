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
        $part = Part::findOrFail($partId);
        $this->name = $part->name;
        $this->property_number = $part->property_number;
        $this->brand = $part->brand;
        $this->tool_id = $part->tool_id;
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

        // Set a default price
        $data['price'] = 1;

        // Determine the status_id based on tool_id
        if ($this->tool_id) {
            $data['status_id'] = 20;
        } else {
            $data['status_id'] = 25;
        }

        if ($this->partId) {
            $part = Part::findOrFail($this->partId);
            $this->logChanges($part, $data); // Log changes
            $part->update($data);
          
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $part = Part::create($data);
            $this->logNewPart($part); // Log creation
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closePartModal');
        $this->emit('refreshParentPart');
        $this->emit('refreshTable');
    }

    // Log changes
    private function logChanges($part, $data)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . ' updated part: ';

        $fields = ['name', 'brand', 'property_number', 'price', 'tool_id'];
        foreach ($fields as $field) {
            if ($part->$field != $data[$field]) {
                $properties["old_$field"] = $part->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst($field) . ": " . $part->$field . " to " . $data[$field] . ", ";
            }
        }

        if (!empty($properties)) {
            activity()
                ->performedOn($part)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }

    // Log new part creation
    private function logNewPart($part)
    {
        $properties = [
            'name' => $part->name,
            'brand' => $part->brand,
            'property_number' => $part->property_number,
            'price' => $part->price,
            'tool_id' => $part->tool_id,
        ];

        $logMessage = auth()->user()->first_name . ' created part: ' . $part->name . '.';

        activity()
            ->performedOn($part)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
    }

    public function render()
    {
        $tools = Tool::all();
        return view('livewire.part.part-form', [
            'tools' => $tools,
        ]);
    }
}
