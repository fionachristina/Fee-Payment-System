<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public function fees(){
        return $this->hasMany('App\Fees','student_id');
    }
}
