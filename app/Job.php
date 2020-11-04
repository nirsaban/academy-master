<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function like(){
        return $this->hasMany(Like::class,'id','beloved');
    }
}
