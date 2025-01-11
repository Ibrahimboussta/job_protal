<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //


    protected $table = 'offres';

    protected $fillable = [
        'title',
        'description',
        'category',
        'location',
        'levels',
        'salary',
        'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Apply::class);
    }
}
