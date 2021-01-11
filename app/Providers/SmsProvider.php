<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class SmsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    public function send(User $user, $code)
    {
        $user->logincode()->create(['code' => $code, 'expired_at' => now()->minutes(5)]);
        //$client = new Client();
        $response = Http::get(config('services.sms.url'),$this->preparing_data_for_sms_sender($code));
    }
    public function preparing_data_for_sms_sender($code)
    {
        $data = [
            'p1' => 'OTP',
            'tnum' => '+989014627125',
            'v1' => $code,
            'fnum' =>'+983000505',
            'pid' => 'avolm8i3rb',
            'apikey' => config('services.sms.apikey')
        ];
        return $data;
    }
}
