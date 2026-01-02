<?php

namespace App\Observers;

use App\Models\Portfolio;

class PortfolioObserve
{
    /**
     * Handle the Portfolio "created" event.
     */
    public function created(Portfolio $portfolio): void
    {
        //
    }

    /**
     * Handle the Portfolio "updated" event.
     */
    public function updated(Portfolio $portfolio): void
    {
        //
    }

    /**
     * Handle the Portfolio "deleted" event.
     */
    public function deleted(Portfolio $portfolio): void
    {
        //
    }

    /**
     * Handle the Portfolio "restored" event.
     */
    public function restored(Portfolio $portfolio): void
    {
        //
    }

    /**
     * Handle the Portfolio "force deleted" event.
     */
    public function forceDeleted(Portfolio $portfolio): void
    {
        //
    }
}
