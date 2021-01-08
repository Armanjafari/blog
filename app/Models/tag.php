<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['id','name'];
    use HasFactory;
    public function articles()
    {
        return $this->belongsToMany(post::class,'post_tag');
    }
}
