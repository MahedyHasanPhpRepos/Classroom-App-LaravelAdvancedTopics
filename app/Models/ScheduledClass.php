<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledClass extends Model
{
    use HasFactory;


    // protected $guarded = null ; 

    protected $fillable = [
        'teacher_id',
        'class_type_id',
        'date_time'
    ];


    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }
}
