<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'profile_image',
        'email',
        'phone',
        'status',
        'notes',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'candidate_job', 'candidate_id', 'job_id')
            ->withTimestamps();
        // ->withPivot('status', 'notes');
    }
    public function interviews()
    {
        return $this->hasMany(Interview::class);
    }
    public function communications()
    {
        return $this->hasMany(related: Communication::class);
    }
    public function getProfileImageUrlAttribute()
    {
        return $this->profile_image
            ? asset('storage/' . ltrim($this->profile_image, '/'))
            : asset('images/default-profile-image.png');
    }
}
