<?php

namespace App\Http\Livewire\Tool;

use App\Models\Part;
use App\Models\Tool;
use App\Models\Type;
use App\Models\Source;
use App\Models\Status;
use Livewire\Component;
use App\Models\Borrower;
use App\Models\Category;
use App\Models\PartType;
use App\Models\Position;
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

    public function addPart()
    {

        $this->partItems[] = [
            'part_type_id' => null,
            'property_number' => '',
            'brand_id' => null,
        ];

        $this->emit('disableButton1');
        $this->emit('enableButton2');
    }

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
                $this->logChanges($tool, $data);
                $tool->update($data);

                // Delete previous ToolPosition and ToolSecurity entries for the tool
                $tool->position_keys()->delete();
                $tool->security_keys()->delete();
                //$tool->parts()->update(['tool_id' => null, 'status_id' => 25]);

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

                // foreach ($this->partItems as $partId) {
                //     $part = Part::find($partId);
                //     if ($part) {
                //         $part->tool_id = $tool->id;
                //         $part->status_id = $part->tool_id ? 20 : 25;
                //         $part->update();
                //     }
                // }
            }
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            //$data['status_id'] = 1;
            if ($this->source_id == 3) {
                $data['status_id'] = 1;
            }

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
            $this->logNewTool($tool);

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
    private function logChanges($tool, $data)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . ' updated tool: ';
    
        $fields = ['category_id', 'source_id', 'type_id', 'status_id', 'brand', 'property_number', 'barcode', 'owner_id'];
        foreach ($fields as $field) {
            if ($tool->$field != $data[$field]) {
                $properties["old_$field"] = $tool->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst(str_replace('_', ' ', $field)) . ": " . $tool->$field . " to " . $data[$field] . ", ";
            }
        }
    
        // Logging for partItems
        $oldPartItems = $tool->Parts()->pluck('id')->toArray();
        sort($oldPartItems);
        $newPartItems = $data['partItems'] ?? [];
        sort($newPartItems);
        if ($oldPartItems != $newPartItems) {
            $properties['old_part_items'] = implode(',', $oldPartItems);
            $properties['new_part_items'] = implode(',', $newPartItems);
            $logMessage .= "Part Items updated, ";
        }
    
        // Logging for securityItems
        $oldSecurityItems = $tool->security_keys()->pluck('security_id')->toArray();
        sort($oldSecurityItems);
        $newSecurityItems = $data['securityItems'] ?? [];
        sort($newSecurityItems);
        if ($oldSecurityItems != $newSecurityItems) {
            $properties['old_security_items'] = implode(',', $oldSecurityItems);
            $properties['new_security_items'] = implode(',', $newSecurityItems);
            $logMessage .= "Security Items updated, ";
        }
    
        // Logging for positionItems
        $oldPositionItems = $tool->position_keys()->pluck('position_id')->toArray();
        sort($oldPositionItems);
        $newPositionItems = $data['positionItems'] ?? [];
        sort($newPositionItems);
        if ($oldPositionItems != $newPositionItems) {
            $properties['old_position_items'] = implode(',', $oldPositionItems);
            $properties['new_position_items'] = implode(',', $newPositionItems);
            $logMessage .= "Position Items updated, ";
        }
    
        if (!empty($properties)) {
            activity()
                ->performedOn($tool)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }
    
    

    private function logNewTool($tool)
    {
        $properties = [
            'new_category_id' => $tool->category_id,
            'new_source_id' => $tool->source_id,
            'new_type_id' => $tool->type_id,
            'new_status_id' => $tool->status_id,
            'new_brand' => $tool->brand,
            'new_property_number' => $tool->property_number,
            'new_barcode' => $tool->barcode,
            'new_owner_id' => $tool->owner_id,
        ];
    
      
    
        // Logging for securityItems
        $newSecurityItems = $tool->security_keys()->pluck('security_id')->toArray();
        if (!empty($newSecurityItems)) {
            $properties['new_security_items'] = implode(',', $newSecurityItems);
        }
    
        // Logging for positionItems
        $newPositionItems = $tool->position_keys()->pluck('position_id')->toArray();
        if (!empty($newPositionItems)) {
            $properties['new_position_items'] = implode(',', $newPositionItems);
        }

          // Logging for partItems
          $newPartItems = $tool->Parts()->pluck('id')->toArray();
          if (!empty($newPartItems)) {
              $properties['new_part_items'] = implode(',', $newPartItems);
          }
    
        $logMessage = auth()->user()->first_name . ' created tool. Property number: ' . $tool->property_number . ', Brand: ' . $tool->brand . '.';
    
        activity()
            ->performedOn($tool)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
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
        $partTypes = PartType::all();
        //$partTypes = Status::all();
        $brands = Status::all();

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
            'partTypes' => $partTypes,
            'brands' => $brands,
        ]);
    }
}
