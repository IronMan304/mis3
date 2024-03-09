<?php

namespace App\Http\Livewire\Venue;

use App\Models\Venue;
use Livewire\Component;

class VenueForm extends Component
{
    public $venueId, $description;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'venueId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function venueId($venueId)
    {
        $this->venueId = $venueId;
        $venue = Venue::whereId($venueId)->first();
        $this->description = $venue->description;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'description' => 'required',
        ]);

        if ($this->venueId) {
            Venue::whereId($this->venueId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            Venue::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeVenueModal');
        $this->emit('refreshParentVenue');
        $this->emit('refreshTable');
    }

    public function render()
    {
        return view('livewire.venue.venue-form');
    }
}
