<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle(): void
    {
        // This is the code that executes in the background terminal when the job runs!
        info("Real background job processing: Sending capture notification email to {$this->email}");
    }
}