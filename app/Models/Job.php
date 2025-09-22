<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = "jobs_candidates";
    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'status',
    ];

    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_job', 'job_id', 'candidate_id')
            ->withTimestamps();
        // ->withPivot('status', 'notes');
    }

    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
}
