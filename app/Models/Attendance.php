<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance'; // Specify the table name if it differs from the default convention

    protected $fillable = [
        'classid',
        'studentid',
        'isPresent',
        'comments',
    ];
    public function class(){   

        return $this->belongsTo(Classes::class, 'classid', 'id');

    }


    // Add any additional model configuration, relationships, or methods as needed
}