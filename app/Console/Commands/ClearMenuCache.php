<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearMenuCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:menu-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description clear menu cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Cache::forget('menu');
        $this->info('Menu cache cleared successfully.');

        return 0;
    }
}
