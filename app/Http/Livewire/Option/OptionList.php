<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use Livewire\Component;

class OptionList extends Component
{
    public $optionId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentOption' => '$refresh',
        'deleteOption',
        'editOption',
        'deleteConfirmOption'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createOption()
    {
        $this->emit('resetInputFields');
        $this->emit('openOptionModal');
    }

    public function editOption($optionId)
    {
        $this->optionId = $optionId;
        $this->emit('optionId', $this->optionId);
        $this->emit('openOptionModal');
    }

    public function deleteOption($optionId)
    {
        Option::destroy($optionId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $options  = Option::all();
        } else {
            $options  = Option::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.option.option-list', [
            'options' => $options
        ]);
    }
}
