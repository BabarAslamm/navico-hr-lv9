<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
	protected $collection = 'employees';


    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'user_id', 'address_id', 'location_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', '_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', '_id');
    }
}
