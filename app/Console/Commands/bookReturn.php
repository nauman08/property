<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Customer;
use App\Inventory;
use App\User;
use Illuminate\Support\Facades\Mail;

class bookReturn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send regular Email to user To return back the book';

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
        $data = array();

        $expiredBooks = Customer::where('return_date','<',date('d-m-y'))->where('user_return',null)->groupBy('user_id')->get();
        if($expiredBooks){
            foreach($expiredBooks as $empNos) {
                $emailAddress = User::where('id', $empNos->user_id)->select('email')->first();
                $customerExpiredBooks = Customer::where('user_id',$empNos->user_id)->where('return_date','<',date('d-m-Y'))->get();
                    foreach($customerExpiredBooks as $expiredBook){
                        $data = array('bookName' => $expiredBook->bookName['attr_name'], 'fine' => $expiredBook->fine+20 , 'returnDate' => $expiredBook->return_date);
                        Mail::send('mail', $data, function ($message) use ($emailAddress) {
                            $message->from('noreply@nauman.com', 'Library Management');
                            $message->to($emailAddress['email'])->subject('Book Return Reminder');
                        });
                        $fine = $expiredBook->fine+20;
                        Customer::where('id',$expiredBook->id)->update(['fine' => $fine]);
                    }
            }
        }
        $this->info('Daily Update has been send successfully');
    }
}
