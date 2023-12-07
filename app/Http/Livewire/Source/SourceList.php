<?php

namespace App\Http\Livewire\Source;

use App\Models\Source;
use Livewire\Component;

class SourceList extends Component
{
    public $sourceId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentSource' => '$refresh',
        'deleteSource',
        'editSource',
        'deleteConfirmSource'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createSource()
    {
        $this->emit('resetInputFields');
        $this->emit('openSourceModal');
    }

    public function editSource($sourceId)
    {
        $this->sourceId = $sourceId;
        $this->emit('sourceId', $this->sourceId);
        $this->emit('openSourceModal');
    }

    public function deleteSource($sourceId)
    {
        Source::destroy($sourceId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $sources  = Source::all();
        } else {
            $sources  = Source::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.source.source-list', [
            'sources' => $sources
        ]);
    }
}
