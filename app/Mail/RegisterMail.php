<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emailtest');
    }
    public function sendsms(User $user, $text)
    {
        $data = [
            'p1' => 'OTP',
            'tnum' => '+989014627125',
            'v1' => $text,
            'fnum' =>'+983000505',
            'pid' => 'avolm8i3rb',
            'apikey' => config('services.sms.apikey')
        ];
        //$client = new Client();
        $response = Http::get(config('services.sms.url'),$data);
    }
}
