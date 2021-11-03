<?php

namespace App\Listeners;

use App\Models\Visit;
use App\Events\VisitsForMain;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HowManyVisits
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
     * @param  VisitsForMain  $event
     * @return void
     */
    public function handle(VisitsForMain $event)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d');
        $visitToday = Visit::where('ip', $ip)->where('date', $date)->get();
        if ($visitToday->count() == 0) {
            $visit = $event->visit;
            $visit->ip = $ip;
            $visit->date = $date;
            $visit->save();    
        }
    }
}
