<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class InstantAutosave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instant:autosave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command runs bills user\'s card for their daily autosave accounts';

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
        //


            Mail::raw("This is automatically generated Hourly Update", function($message)
            {
                $message->from('librallaw@gmail.com');
                $message->to("librallaw@yahoo.com")->subject('Hourly Update');
            });
        $this->info('Hourly Update has been send successfully');

    }
}
