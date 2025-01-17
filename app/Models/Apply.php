<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    // protected $table = 'applies';
    protected $fillable = [
        'user_id',
        'job_id',
        'full_name',
        'email',
        'address',
        'city',
        'resume',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
