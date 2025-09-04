<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
        'class',
    ];

    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class);
    }
}
