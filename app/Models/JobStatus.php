<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class JobStatus extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
	protected $collection = 'job_statuses';

    protected $fillable = [
        'status', 'mail_alias', 'created_by', 'modified_by'
    ];
}
