<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class cronAutosave extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Autosave';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        /*$user  =  new User();
        $user->first_name = date('d m y : h:i:s',time());
        $user->lastname ="new";
        $user->email ="new emal";
        $user->password ="newpassword";
        $user->unique_id ="aweruenew";
        $user->save();*/




        // the message
        $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

// send email
        mail("librallaw@yahoo.com","My subject",$msg);


        echo "done";


    }
}
