<?php

namespace App\Listeners;

use App\Events\PedidoStatusChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PedidoStatusChangedListener
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
     * @param  PedidoStatusChanged  $event
     * @return void
     */
    public function handle(PedidoStatusChanged $event)
    {
        //
    }
}
