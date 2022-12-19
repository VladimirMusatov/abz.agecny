<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [

        'name',
        'position_id', 
        'date_start_works',
        'employer_id',
        'subordination_level',
        'phone', 
        'email',
        'amount_salary', 
        'photo', 
        'admin_created_id',
        'admin_updated_id',

    ];

    public function Position()
    {
        return $this->belongsTo(Position::class);
    }

    public function Employer()
    {
        return $this->belongsTo(Employee::class);
    }
}
