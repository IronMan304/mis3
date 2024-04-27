<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class GlobalBroadcasting extends Component
{

    public function render()
    {
        $key = 'broadcasting';
        $event = Cache::get($key);
        if ($event) {
            Cache::forget($key);
            $this->emit('broadcasting', $event);
            $this->dispatchBrowserevent('notify', [
                'content' => $event['data']['message_text'],
                'type' => 'info',
            ]);
        }
        return view('livewire.global-broadcasting');
    }
}
