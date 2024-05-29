<?php

namespace App\Http\Livewire\Type;

use App\Models\Type;
use Livewire\Component;
use App\Models\Category;

class TypeForm extends Component
{
    public $typeId, $category_id, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'typeId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    // Edit
    public function typeId($typeId)
    {
        $this->typeId = $typeId;
        $type = Type::findOrFail($typeId);
        $this->description = $type->description;
        $this->category_id = $type->category_id;
    }

    // Store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
            'category_id' => 'required',
        ]);

        if ($this->typeId) {
            $type = Type::findOrFail($this->typeId);
            $this->logChanges($type, $data);
            $type->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $type = Type::create($data);
            $this->logNewType($type);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeTypeModal');
        $this->emit('refreshParentType');
        $this->emit('refreshTable');
    }

    private function logChanges($type, $data)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . ' updated type: ';

        $fields = ['description', 'category_id'];
        foreach ($fields as $field) {
            if ($type->$field != $data[$field]) {
                $properties["old_$field"] = $type->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst(str_replace('_', ' ', $field)) . ": " . $type->$field . " to " . $data[$field] . ", ";
            }
        }

        if (!empty($properties)) {
            activity()
                ->performedOn($type)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }

    private function logNewType($type)
    {
        $properties = [
            'new_description' => $type->description,
            'new_category_id' => $type->category_id,
        ];

        $logMessage = auth()->user()->first_name . ' created type: Description - ' . $type->description . ', Category ID - ' . $type->category_id . '.';

        activity()
            ->performedOn($type)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.type.type-form', [
            'categories' => $categories
        ]);
    }
}
