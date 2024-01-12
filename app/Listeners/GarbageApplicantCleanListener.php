<?php

namespace App\Listeners;

use App\Events\GarbageApplicantCleanEvent;
use App\Modules\Applicant\Models\Applicant;

class GarbageApplicantCleanListener
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

    public function handle(GarbageApplicantCleanEvent $event)
    {
        $applicant = $event->applicant;
        $applicantId = $applicant->id ?? null;
        $this->garbageApplicantsClean($applicantId);
    }

    public function garbageApplicantsClean($applicantId){
        $createdByUserId = auth()->user()->id ?? null;
        Applicant::where('status',0)
            ->where('created_by',$createdByUserId)
            ->where('id','!=',$applicantId)
//            ->whereDate('created_at','<',Carbon::today()->toDateString())
            ->delete();
    }
}
