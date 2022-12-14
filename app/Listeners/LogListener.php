<?php

namespace App\Listeners;

use App\Events\LogEvent;
use App\Models\log as ModelsLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LogEvent  $event
     * @return void
     */
    public function handle(LogEvent $event)
    {
        ModelsLog::create($event->data);
    }
}
