<?php

namespace App\Http\Livewire\Tool;

use App\Models\Part;
use App\Models\Tool;
use App\Models\Type;
use App\Models\Source;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Category;
use App\Models\Position;
use App\Models\Status;
use App\Models\ToolPosition;
use App\Models\ToolSecurity;

class ToolForm extends Component
{
    public $toolId, $user_id, $category_id, $source_id, $type_id, $status_id, $property_number, $barcode, $brand, $position_id, $owner_id;
    public $action = '';  //flash
    public $message = '';  //flash
    public $selectedCategory;
    public $preserveDataTableState = false;
    public $positionItems = [];
    public $securityItems = [];
    public $partItems = [];

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
        $tool = Tool::find($toolId);

        if ($tool) {
            $this->category_id = $tool->category_id;
            $this->source_id = $tool->source_id;
            $this->type_id = $tool->type_id;
            $this->status_id = $tool->status_id;
            $this->property_number = $tool->property_number;
            $this->barcode = $tool->barcode;
            $this->brand = $tool->brand;
            $this->owner_id = $tool->owner_id;

            // Populate toolItems with the IDs of associated tools
            $this->positionItems = $tool->position_keys->pluck('position_id')->toArray();
            $this->securityItems = $tool->security_keys->pluck('security_id')->toArray();
            $this->partItems = $tool->Parts->pluck('id')->toArray(); // Get parts IDs

             // Map the part items correctly
            //  $this->partItems = $tool->Parts->map(function($part) {
            //     return [
            //         'part_type_id' => $part->part_type_id,
            //         'property_number' => $part->property_number,
            //         'brand_id' => $part->brand_id,
            //     ];
            // })->toArray();
        }
    }

    // public function addPart()
    // {

    //     $this->partItems[] = [
    //         'part_type_id' => null,
    //         'property_number' => '',
    //         'brand_id' => null,
    //     ];

    //     $this->emit('disableButton1');
    //     $this->emit('enableButton2');
    // }

    public function preserveDataTableState()
    {
        $this->preserveDataTableState = true;
    }

    //store
    public function store()
    {
        $rules = [
            'user_id' => 'nullable',
            'category_id' => 'required',
            'source_id' => 'required',
            'type_id' => 'required',
            'status_id' => 'nullable',
            'brand' => 'required',
            'property_number' => 'required',
            'barcode' => 'nullable',
            'positionItems' => 'nullable|array',
            'securityItems' => 'nullable|array',
            'owner_id' => 'nullable',
        ];
    
        if ($this->source_id == 4) {
            $rules['owner_id'] = 'required';
        }
    
        $data = $this->validate($rules);
    
        if ($this->source_id == 4) {
            $data['status_id'] = 22;
        }
        $data['user_id'] = auth()->user()->id;
    
        if ($this->toolId) {
            $tool = Tool::find($this->toolId);
            if ($tool) {
                $tool->update($data);
    
                // Delete previous ToolPosition and ToolSecurity entries for the tool
                $tool->position_keys()->delete();
                $tool->security_keys()->delete();
                $tool->parts()->update(['tool_id' => null, 'status_id' => 25]);
    
                foreach ($this->positionItems as $positionId) {
                    ToolPosition::updateOrCreate(
                        ['tool_id' => $tool->id, 'position_id' => $positionId]
                    );
                }
    
                foreach ($this->securityItems as $securityId) {
                    ToolSecurity::updateOrCreate(
                        ['tool_id' => $tool->id, 'security_id' => $securityId]
                    );
                }
    
                foreach ($this->partItems as $partId) {
                    $part = Part::find($partId);
                    if ($part) {
                        $part->tool_id = $tool->id;
                        $part->status_id = $part->tool_id ? 20 : 25;
                        $part->update();
                    }
                }
            }
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $data['status_id'] = 1;
    
            $tool = Tool::create($data);
    
            foreach ($this->positionItems as $positionId) {
                ToolPosition::create([
                    'tool_id' => $tool->id,
                    'position_id' => $positionId,
                ]);
            }
    
            foreach ($this->securityItems as $securityId) {
                ToolSecurity::create([
                    'tool_id' => $tool->id,
                    'security_id' => $securityId,
                ]);
            }
    
            foreach ($this->partItems as $partId) {
                $part = Part::find($partId);
                if ($part) {
                    $part->tool_id = $tool->id;
                    $part->status_id = $part->tool_id ? 20 : 25;
                    $part->save();
                }
            }
    
            $action = 'store';
            $message = 'Successfully Created';
        }
    
        $this->emit('flashAction', $action, $message);
        $this->emit('preserveDataTableState');
        $this->resetInputFields();
        $this->emit('refreshTable');
        $this->emit('closeToolModal');
        $this->emit('refreshParentTool');
    }
    public function deletePart($partIndex)
    {
        unset($this->partItems[$partIndex]);
        $this->partItems = array_values($this->partItems);
    }

    

    public function render()
    {
        $categories = Category::with('types')->get();
        $sources = Source::all();
        $types = Type::where('category_id', $this->category_id)->get();
        $positions = Position::all();
        $securities = Position::all();
        $tools = Tool::all();
        $borrower = Borrower::where('user_id', auth()->user()->id)->value('id');
        $borrowers = Borrower::all();
        $parts = Part::all(); 
        // $partTypes = PartType::all();
        // $partTypes = Status::all();
        // $brands = Status::all();

        return view('livewire.tool.tool-form', [
            'categories' => $categories,
            'sources' => $sources,
            'types' => $types,
            'positions' => $positions,
            'tools' => $tools,
            'borrower' => $borrower,
            'securities' => $securities,
            'borrowers' => $borrowers,
            'parts' => $parts,
            // 'partTypes' => $partTypes,
            // 'brands' => $brands,
        ]);
    }
}
