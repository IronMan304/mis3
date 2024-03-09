<?php

namespace App\Http\Livewire\Venue;

use App\Models\Venue;
use Livewire\Component;

class VenueList extends Component
{
    public $venueId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentVenue' => '$refresh',
        'deleteVenue',
        'editVenue',
        'deleteConfirmVenue'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createVenue()
    {
        $this->emit('resetInputFields');
        $this->emit('openVenueModal');
    }

    public function editVenue($venueId)
    {
        $this->venueId = $venueId;
        $this->emit('venueId', $this->venueId);
        $this->emit('openVenueModal');
    }

    public function deleteVenue($venueId)
    {
        Venue::destroy($venueId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $venues  = Venue::all();
        } else {
            $venues  = Venue::where('description', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.venue.venue-list', [
            'venues' => $venues
        ]);
    }
}
