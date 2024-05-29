<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCache extends Command
{
    protected $signature = 'mark:gay';
    protected $description = 'Clear all caches';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('route:clear');
        $this->call('config:clear');
        $this->call('view:clear');
        $this->call('cache:clear');
        $this->call('event:clear');

        $this->info('All caches cleared successfully!');
    }
}
