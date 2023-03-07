<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
    ];

     //eloquent relationship function ie post has a user 
     public function user(){
        return $this->belongsTo(User::class);
    }

    public function malike(){
        return $this->hasMany(Like::class);
    }
}
