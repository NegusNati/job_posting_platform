<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

class MailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct( public Job $jobListing )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //a mail to send to employer with job details, but not synchroniously. put it in a queue then dispatch it using this Job class(mailJob);
         Mail::to($this->jobListing->employer->user)->queue(new JobPosted( $this->jobListing) );

        // Mail::to( $jobListing->employer->user)->queue(new JobPosted( $jobListing) );
    }
}
