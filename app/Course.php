<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function job()
    {
        return $this->hasMany(Job::class);
    }

}
