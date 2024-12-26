<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'mobile', 
        'country_code', 
        'address', 
        'gender', 
        'hobbies', 
        'photo_path', // For storing the file path of the employee photo
    ];

    // If you are storing hobbies as a JSON field, you can cast it like so:
    protected $casts = [
        'hobbies' => 'array',
    ];
}
