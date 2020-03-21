<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;  
class sendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Emails done';

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
     
    // Finding a random word
    $key ="Good Morning";
    $value = "Have a nice day!";
     
    $users = User::all();
    foreach ($users as $user) {
        Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
            $mail->from('kumaripri6@gmail.com');
            $mail->to($user->email)
                ->subject('Happy Birthday');
        });
    }
     
    $this->info('Wish of the Day sent to All Users');
    }


    
}
