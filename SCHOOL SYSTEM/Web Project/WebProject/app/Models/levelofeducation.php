<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class levelofeducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function students()
    {
        return $this->hasMany(Student::class, 'level_of_education_id');
    }
}
