<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
	protected $collection = 'designations';

    protected $fillable = [
        'designation_name', 'mail_alias', 'created_by', 'modified_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', ' _id');
    }

}
