<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    public function job(){
        return $this->hasMany(Job::Class);
    }
    public function course(){
        return $this->belongsTo(Course::Class);
}
public function profile(){
        return $this->hasMany(Profile::class);
}
}
