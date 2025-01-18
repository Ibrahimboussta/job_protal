<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    //
    protected $fillable = ['image_path', 'job_id']; // Mass assignable fields

    // Define the inverse relationship
    public function job()
    {
        return $this->belongsTo(Job::class); // Link back to the job model
    }
}
