<?php

namespace App\Listeners;

use App\Events\ProcessHistoryEvent;
use App\Modules\Process\Models\ProcessHistory;
use Carbon\Carbon;

class ProcessHistoryListener
{

    public function saveProcessHistory($process){
        $processHistory = new ProcessHistory();
        $processHistory->process_id = $process->id;
        $processHistory->service_id = $process->service_id;
        $processHistory->record_id = $process->record_id;
        $processHistory->initiated_by = $process->initiated_by;
        $processHistory->closed_by = $process->closed_by;
        $processHistory->desk_id = $process->desk_id;
        $processHistory->status_id = $process->status_id;
        $processHistory->attachment = $process->attachment;
        $processHistory->remarks = $process->remarks;
        $processHistory->created_by = $process->created_by;
        $processHistory->updated_by = $process->updated_by;
        $processHistory->created_at = Carbon::now();
        $processHistory->updated_at = Carbon::now();
        $processHistory->save();
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProcessHistoryEvent $event)
    {
        $process = $event->processHistory;
        $this->saveProcessHistory($process);
    }
}
