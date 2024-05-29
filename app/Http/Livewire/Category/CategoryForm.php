<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public $categoryId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'categoryId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    // Edit
    public function categoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        $category = Category::findOrFail($categoryId);
        $this->description = $category->description;
    }

    // Store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->categoryId) {
            $category = Category::findOrFail($this->categoryId);
            $this->logChanges($category, $data);
            $category->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $category = Category::create($data);
            $this->logNewCategory($category);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeCategoryModal');
        $this->emit('refreshParentCategory');
        $this->emit('refreshTable');
    }

    private function logChanges($category, $data)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . ' updated category: ';

        $fields = ['description'];
        foreach ($fields as $field) {
            if ($category->$field != $data[$field]) {
                $properties["old_$field"] = $category->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst($field) . ": " . $category->$field . " to " . $data[$field] . ", ";
            }
        }

        if (!empty($properties)) {
            activity()
                ->performedOn($category)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }

    private function logNewCategory($category)
    {
        $properties = [
            'description' => $category->description,
        ];

        $logMessage = auth()->user()->first_name . ' created category: Description - ' . $category->description . '.';

        activity()
            ->performedOn($category)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
    }

    public function render()
    {
        return view('livewire.category.category-form');
    }
}
