<?php

namespace App\Listeners;

use App\Events\BroadcastingEvent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BroadcastingListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BroadcastingEvent $event): void
    {
        Cache::put('broadcasting', [
            'name' => $event->name,
            'data' => $event->data
        ], now()->addMinutes(5));
    }
}
