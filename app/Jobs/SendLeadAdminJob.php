<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeadCreatedMail;

class SendLeadAdminJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Lead $lead)
    {
        //
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('hiramalem@gmail.com')->send(new LeadCreatedMail($this->lead));
    }
}
