<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'height',
        'weight',
        'vision_left',
        'vision_right',
        'vision_left_corrected',
        'vision_right_corrected',
        'hearing_test',
        'dental_exam',
        'recorded_date'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
