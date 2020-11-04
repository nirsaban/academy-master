<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $guarded = [];
    public function user(){
        return $this->belongsTo(User::class,'beloved','id');
    }
    public function job(){
        return $this->belongsTo(Job::class,'love','id');
    }


}
