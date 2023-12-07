<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';
    protected $fillable = [
        'id',
        'teacherid',
        'starttime',
        'endtime',
        'credit_hours'
        
    ];
    public function attendances(){

        return $this->hasMany(Attendance::class, 'classid', 'id');
        
    }

}
