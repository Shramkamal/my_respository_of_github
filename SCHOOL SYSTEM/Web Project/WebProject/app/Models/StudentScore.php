<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'kurdish',
        'arabic',
        'english',
        'mathematic',
        'physic',
        'chemistry',
        'biology',
        'religion',
        'sport',
        'art',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
