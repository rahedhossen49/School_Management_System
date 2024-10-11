<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignTeacherToClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
    ];

    public function class(){
        return $this->belongsTo(Classes::class,'class_id');
    }


    public function subject(){
        return $this->belongsTo(subject::class,'subject_id');
    }



    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }
}
