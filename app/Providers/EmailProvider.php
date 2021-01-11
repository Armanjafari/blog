<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class EmailProvider extends ServiceProvider
{
    public function __construct($app)
    {
    }

    public function send(Mailable $mailable)
    {
        return Mail::to("armanjafary1@gmail.com")->send($mailable);
    }

}
