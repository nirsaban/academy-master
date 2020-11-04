<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $guarded = [];
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function category(){
       return $this->belongsTo(Category::class);
   }
   public function userCourse(){
       return $this->hasOneThrough(Course::class, User::class);

   }
}
