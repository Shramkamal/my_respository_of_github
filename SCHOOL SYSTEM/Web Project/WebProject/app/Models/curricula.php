<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level_of_education',
        'curriculum_upload',
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'curriculas_id', 'id');
    }
}
