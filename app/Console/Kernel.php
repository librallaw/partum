<?php

namespace App\Console;

use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //

        'App\Console\Commands\cronAutosave',
        Commands\InstantAutosave::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('instant:autosave')
                 ->everyFiveMinutes();

     /*
        $schedule->call(function () {

            $user  =  new User();
            $user->first_name = date('d m y : h:i:s',time());
            $user->lastname ="new";
            $user->email ="new emal";
            $user->password ="newpassword";
            $user->unique_id ="aweruenew";
            $user->save();

        })->everyMinute();
     */


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
