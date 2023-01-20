<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use App\Models\Log;

class LoginLogger
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
    public function handle($event)
    {
        $log=new Log();

        $log->user_id=auth()->user()->id;
        $log->method='login';

        $meta= new \stdClass();

        $meta->ip=request()->ip();

        $log->meta=$meta;

        $log->save();

    }
}
