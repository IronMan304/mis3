<?php

namespace App\Http\Livewire;

use App\Models\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class Broadcasting extends Component
{
    public $messageText;
    public $count;
    public $requestNumbers = [];

    public function mount()
    {
        $this->updateCounts();
    }

    public function render()
    {
        return <<<'blade'
            <div wire:poll.1s>
                {{-- Display the count of requests with status_id 11
                <p>{{ $count }}</p> --}}
            </div>
        blade;
    }

    private function updateCounts()
    {
        // Retrieve requests with status_id equal to 11
        $requests = Request::all();
        // $requests = Request::where('status_id', 11)->get();
        // $requests = Request::where('status_id', 11)->get();
        // $requests = Request::where('status_id', 11)->get();
        // $requests = Request::where('status_id', 11)->get();
        // $requests = Request::where('status_id', 11)->get();

        // Count the number of requests with status_id equal to 11
        $this->count = $requests->count();

        // Store request numbers in an array
        $this->requestNumbers = $requests->sortByDesc('id');


        // Share the count with all views
        View::share('count', $this->count);
        View::share('requestNumbers', $this->requestNumbers);
    }

    public function updated()
    {
        // Update counts when the Livewire component is updated
        $this->updateCounts();
    }
}
