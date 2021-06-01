<?php

namespace App\Console\Commands;

use App\Mail\EveryHourMail;
use App\Mail\SuccessEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailEveryHour extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Every Hour';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Mail::to('m.fayez.radwan@gmail.com')->send(new  EveryHourMail());

    }
}
