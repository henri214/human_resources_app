<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'type',
        'subject',
        'message',
        'sent_at',
        'status',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
