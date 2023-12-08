<?php

namespace App\Http\Livewire\Tool;

use App\Models\Tool;
use App\Models\Type;
use App\Models\Source;
use Livewire\Component;
use App\Models\Category;

class ToolForm extends Component
{
    public $toolId, $user_id, $category_id, $source_id, $type_id, $status_id, $property_number, $barcode, $brand;
    public $action = '';  //flash
    public $message = '';  //flash
    public $selectedCategory;

    protected $listeners = [
        'toolId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function toolId($toolId)
    {
        $this->toolId = $toolId;
        $tool = Tool::whereId($toolId)->first();
        $this->category_id = $tool->category_id;
        $this->source_id = $tool->source_id;
        $this->type_id = $tool->type_id;
        $this->status_id = $tool->status_id;
        $this->property_number = $tool->property_number;
        $this->barcode = $tool->barcode;
        $this->brand = $tool->brand;
    }

    //store
    public function store()
    {
        // dd(auth()->user()->id);
        $data = $this->validate([
            'user_id' => 'nullable',
            'category_id' => 'required',
            'source_id' => 'required',
            'type_id' => 'required',
            'status_id' => 'nullable',
            'brand' => 'required',
            'property_number' => 'required',
            'barcode' => 'nullable',
        ]);
        // Include the 'user_id' in the data array
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 1;

        if ($this->toolId) {
            Tool::whereId($this->toolId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {

            // When creating a new tool, set the 'user_id'
            $data['user_id'] = auth()->user()->id;
            $data['status_id'];

            Tool::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeToolModal');
        $this->emit('refreshParentTool');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $categories = Category::with('types')->get();
        $sources = Source::all();
        $types = Type::where('category_id', $this->category_id)->get();

        return view('livewire.tool.tool-form', [
            'categories' => $categories,
            'sources' => $sources,
            'types' => $types,
        ]);
    }
}
