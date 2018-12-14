<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        "name",
        "days",
        "hours",
        "project_id",
        "user_id",
        "company_id"
    ];


    public function comments(){
        return $this->morphMany('App\Comment' , 'commentable');
    }
}
