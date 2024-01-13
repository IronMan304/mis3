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
        'deleteConfirmCategory',
        'recoverCategory' => '$refresh', 
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
        $category = Category::find($categoryId);

        if ($category) {
            $category->delete();
            $action = 'error';
            $message = 'Successfully Deleted';
        } else {
            $action = 'error';
            $message = 'Category not found';
        }

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function recoverCategory($categoryId)
    {
        $category = Category::withTrashed()->find($categoryId);

        if ($category) {
            $category->restore();
            $action = 'success';
            $message = 'Successfully Recovered';
        } else {
            $action = 'error';
            $message = 'Category not found or already recovered';
        }

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function getTotalToolCount()
    {
        // Retrieve all tools with status_id 1 (In Stock) across all types
        $totalToolCount = Tool::count();

        return $totalToolCount;
    }

    public function render()
    {
        if (empty($this->search)) {
            $categories  = Category::with('types.tools')->get();
        } else {
            $categories  = Category::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.category.category-list', [
            'categories' => $categories
        ]);
    }
}
