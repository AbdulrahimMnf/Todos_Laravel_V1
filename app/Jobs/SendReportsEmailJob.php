<?php

namespace App\Jobs;

use App\Mail\SendReportsEmail;
use App\Traits\ExportUserInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class SendReportsEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ExportUserInfo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $mailData = [
            'title' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
            'body'  => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, error debitis amet provident id quia modi voluptatem deleniti omnis iure soluta obcaecati eos, enim tempora adipisci, delectus laborum possimus dignissimos.',
            'link'  =>  $this->Export()
        ];

        $mail =Auth::user()->email;
        Mail::to($mail)->send(new SendReportsEmail($mailData));
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $mailData = [
        //     'title' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
        //     'body'  => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, error debitis amet provident id quia modi voluptatem deleniti omnis iure soluta obcaecati eos, enim tempora adipisci, delectus laborum possimus dignissimos.',
        //     'link'  =>  $this->Export()
        // ];

        // $mail =Auth::user()->email; //  '5bc95ff7d43d@drmail.in';
        // Mail::to($mail)->send(new SendReportsEmail($mailData));


        //i think mail come null to here

    }
}
