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

    public function likedBy(User $user){
        return $this->malike->contains('user_id', $user->id);  // returns true or false
    }
     //eloquent relationship function ie post has a user 
     public function user(){
        return $this->belongsTo(User::class);
    }

    public function malike(){
        return $this->hasMany(Like::class);
    }
}
