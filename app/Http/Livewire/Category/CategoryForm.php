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

    //edit
    public function categoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        $Category = Category::whereId($categoryId)->first();
        $this->description = $Category->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->categoryId) {
            Category::whereId($this->categoryId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Category::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeCategoryModal');
        $this->emit('refreshParentCategory');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.category.category-form');
    }
}
