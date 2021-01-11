<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginCode extends Model
{
    public $timestamps = false;
    protected $fillable = ['code','user_id','expired_at'];
    protected $table = 'login_code';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
