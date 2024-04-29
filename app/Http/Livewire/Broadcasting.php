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
    public $countPending;
    public $countReviewed;
    public $countApproved;
    public $countStarted;
    public $countCompleted;
    public $requestsPending = [];
    public $requestsApproved = [];
    public $requestsReviewed = [];
    public $requestsStarted = [];
    public $requestsCompleted = [];
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
        $requestsPending = Request::where('status_id', 11)->get();
        $requestsReviewed = Request::where('status_id', 16)->get();
        $requestsApproved = Request::where('status_id', 10)->get();
        $requestsStarted = Request::where('status_id', 6)->get();
        $requestsCompleted = Request::where('status_id', 12)->get();

        // Count the number of requests with status_id equal to 11
        $this->count = $requests->count();

        $this->countPending = $requestsPending->count();
        $this->countReviewed = $requestsReviewed->count();
        $this->countApproved = $requestsApproved->count();
        $this->countStarted = $requestsStarted->count();
        $this->countCompleted = $requestsCompleted->count();

        // Store request numbers in an array
        $this->requestNumbers = $requests->sortByDesc('id');

        $this->requestsPending = $requestsPending->sortByDesc('id');
        $this->requestsReviewed = $requestsReviewed->sortByDesc('id');
        $this->requestsApproved = $requestsApproved->sortByDesc('id');
        $this->requestsStarted = $requestsStarted->sortByDesc('id');
        $this->requestsCompleted = $requestsCompleted->sortByDesc('id');

        // Share the count with all views
        // View::share('count', $this->count);

        // View::share('countPending', $this->countPending);
        // View::share('countReviewed', $this->countReviewed);
        // View::share('countApproved', $this->countApproved);
        // View::share('countStarted', $this->countStarted);
        // View::share('countCompleted', $this->countCompleted);

        // View::share('requestNumbers', $this->requestNumbers);

        // View::share('requestsPending', $this->requestsPending);
        // View::share('requestsReviewed', $this->requestsReviewed);
        // View::share('requestsApproved', $this->requestsApproved);
        // View::share('requestsStarted', $this->requestsStarted);
        // View::share('requestsCompleted', $this->requestsCompleted);
    }
    

    public function updated()
    {
        // Update counts when the Livewire component is updated
        $this->updateCounts();
    }
}
