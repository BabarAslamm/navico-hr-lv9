<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
	protected $collection = 'locations';

    protected $fillable = [
        'location_name', 'mail_alias', 'created_by', 'modified_by'
    ];

}
