<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'curriculas_id',
        'TeacherName',
        'MobileNumber',
        'SecurityCode',
        'NationalCardNumber',
        'BloodGroup',
        'LevelOfEducation',
        'InstallationDate',
        'StudyMaterials',
        'TeachersAssessment',
        'HonoraryAward',
        'TeacherActivity',
        'Certificate',
        'Note',
    ];

    protected $casts = [
        'InstallationDate' => 'date',
    ];

    public function curricula()
    {
        return $this->belongsTo(Curricula::class, 'curriculas_id');
    }
}
