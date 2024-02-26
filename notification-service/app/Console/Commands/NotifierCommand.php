<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class NotifierCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies users on new post';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo 'start listening for blog creation' . PHP_EOL;
        Redis::subscribe('user:created', function ($user) {
            echo 'message received!' . PHP_EOL;
            echo $user. PHP_EOL;
            $data = json_decode($user);
            Log::info($user);
        });
    }
}
