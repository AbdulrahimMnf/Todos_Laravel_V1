<?php

namespace App\Listeners;

use App\Events\LogEvent;
use App\Models\Log as ModelsLog;

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
