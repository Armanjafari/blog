<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['name','id'];
    public function articles()
    {
        return $this->hasMany(post::class,'cat_id','id');
    }
}
