<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public $categoryId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentCategory' => '$refresh',
        'deleteCategory',
        'editCategory',
        'deleteConfirmCategory'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createCategory()
    {
        $this->emit('resetInputFields');
        $this->emit('openCategoryModal');
    }

    public function editCategory($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->emit('categoryId', $this->categoryId);
        $this->emit('openCategoryModal');
    }

    public function deleteCategory($categoryId)
    {
        Category::destroy($categoryId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $categories  = Category::all();
        } else {
            $categories  = Category::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.category.category-list', [
            'categories' => $categories
        ]);
    }
}
