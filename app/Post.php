<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use Hasfactory;
    protected $fillable=[
        'body'
    ];
     public function ownedBy(User $user){
        return $user->id===$this->user_id;
     }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
