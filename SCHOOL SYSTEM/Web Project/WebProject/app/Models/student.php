<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'location',
        'father_mobile_number',
        'mother_mobile_number',
        'father_work',
        'mother_work',
        'chronic_disease',
        'blood_group',
        'level_of_education_id',
        'father_education_level',
        'student_Level',
        'class',
        'note',
    ];

    public function scores()
    {
        return $this->hasOne(StudentScore::class, 'student_id', 'id');
    }
    public function levelOfEducation()
    {
        return $this->belongsTo(LevelOfEducation::class, 'level_of_education_id');
    }
    public function payments()
    {
        return $this->hasMany(StudentPayment::class, 'student_id');
    }
}
