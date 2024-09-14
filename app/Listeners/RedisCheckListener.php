<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\DiagnosingHealth;

class RedisCheckListener
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
    public function handle(DiagnosingHealth $event): void
    {
        $response=Redis::ping();
        if($response == "PONG"){
            Log::info("Redis is up");
        }else{
            Log::info("Redis is down");
            throw new \Exception("Redis is down");
        }
    }
}
