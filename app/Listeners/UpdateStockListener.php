<?php

namespace App\Listeners;

use App\Models\Gudang;
use App\Events\BarangKeluarEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateStockListener
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
    public function handle(BarangKeluarEvent $event)
    {
        $barangKeluar = $event->barangKeluar;
        $gudang = Gudang::where('id', $barangKeluar->gudang_id)->first();

        if ($gudang) {
            $gudang->jumlah -= $barangKeluar->qty;
            $gudang->save();
        }
    }
}
