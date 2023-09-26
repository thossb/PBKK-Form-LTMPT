<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students'; // Specify the table name if it's different from the model name
    protected $fillable = ['nama', 'email', 'password', 'nilairapot', 'nomor_telepon', 'image'];

    // Define any relationships or additional methods here if needed
}
