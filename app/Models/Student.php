<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamp = false;

    //Accessor function

    /*
    public function getStudentNameAttribute($value){
        return $value.' Rawat';
    }

    public function getFatherNameAttribute($value){
        return lcfirst($value);
    }
    */

    //Mutator Functions in Student Model

    public function setFatherNameAttribute($value){
        $this->attributes['father_name'] = 'Shri '.$value;
    }
    

    // public function getBook(){
    //     return $this->hasOne('\App\Models\Book');
    // }
}
