<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [

        'name',
        'job', 
        'date_start_works',
        'phone', 
        'email',
        'amount_salary', 
        'photo', 
        'admin_created_id',
        'admin_updated_id',

    ];
}
