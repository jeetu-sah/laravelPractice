<?php

namespace App\Listeners;

use App\Events\JobsComplete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JobsCompleteListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobsComplete  $event
     * @return void
     */
    public function handle(JobsComplete $event)
    {
        dd($event);
    }
}
