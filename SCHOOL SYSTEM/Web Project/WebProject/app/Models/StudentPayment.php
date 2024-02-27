<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;
    protected $table = 'studentpayments';
    protected $fillable = ['student_id', 'amount', 'date_of_payment', 'note'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
