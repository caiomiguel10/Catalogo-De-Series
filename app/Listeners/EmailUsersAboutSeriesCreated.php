<?php

namespace App\Listeners;
use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Mail\SeriesCreated;


use App\Models\Serie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailUsersAboutSeriesCreated implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesCreatedEvent $event)
    {       
        $users = User::all();
        foreach ($users as $index => $user) {

            $email = new SeriesCreated(
                
                $event->nomeSerie,
                $event->idSerie,
                $event->qtdTemporadas,
                $event->qntEpisodes,
            );


            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);              
            
        }
    }
}
