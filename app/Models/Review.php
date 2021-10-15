<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'gig_id',
        'user_id',
        'content',
        'star'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

}
