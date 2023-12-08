<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance'; // Specify the table name if it differs from the default convention
    protected $primaryKey = ['classid', 'studentid'];
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'classid',
        'studentid',
        'isPresent',
        'comments',
    ];
    public function class(){   

        return $this->belongsTo(Classes::class, 'classid', 'id');

    }
    public function student(){   

        return $this->belongsTo(User::class, 'studentid', 'id');

    }
    protected function setKeysForSaveQuery( $query)
    {
        return $query->where('classid', $this->getAttribute('classid'))
            ->where('studentid', $this->getAttribute('studentid'));
    }

    // Add any additional model configuration, relationships, or methods as needed
}