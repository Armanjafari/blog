<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['id','title','text','cat_id','email'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'email','email');
    }
    public function cat()
    {
        return $this->belongsTo(Categories::class,'cat_id');
    }
    public function tags()
    {
        return $this->belongsToMany(tag::class,'post_tag');
    }
}
