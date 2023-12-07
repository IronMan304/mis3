<?php

namespace App\Http\Livewire\Source;

use App\Models\Source;
use Livewire\Component;

class SourceForm extends Component
{
    public $sourceId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'sourceId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function sourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        $Source = Source::whereId($sourceId)->first();
        $this->description = $Source->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->sourceId) {
            Source::whereId($this->sourceId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Source::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeSourceModal');
        $this->emit('refreshParentSource');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.source.source-form');
    }
}
