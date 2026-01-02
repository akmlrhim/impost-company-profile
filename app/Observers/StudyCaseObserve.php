<?php

namespace App\Observers;

use App\Models\StudyCase;

class StudyCaseObserve
{
    /**
     * Handle the StudyCase "created" event.
     */
    public function created(StudyCase $studyCase): void
    {
        //
    }

    /**
     * Handle the StudyCase "updated" event.
     */
    public function updated(StudyCase $studyCase): void
    {
        //
    }

    /**
     * Handle the StudyCase "deleted" event.
     */
    public function deleted(StudyCase $studyCase): void
    {
        //
    }

    /**
     * Handle the StudyCase "restored" event.
     */
    public function restored(StudyCase $studyCase): void
    {
        //
    }

    /**
     * Handle the StudyCase "force deleted" event.
     */
    public function forceDeleted(StudyCase $studyCase): void
    {
        //
    }
}
