<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'job_id',
        'scheduled_at',
        'location_or_link',
        'status',
        'notes',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function scopeInJobs(Builder $query, $jobId)
    {
        if ($jobId) {
            return $query->where('job_id', $jobId);
        }

        // If no jobId is provided, return all interviews linked to any job
        return $query->whereNotNull('job_id');
    }
}
