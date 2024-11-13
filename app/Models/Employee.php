<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //nama table
    protected $table = 'employees';
    //data yang bisa di isi
    protected $fillable = [
        'name', 
        'gender', 
        'phone', 
        'address', 
        'email', 
        'status', 
        'hired_on'
    ];    
}
