<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'category',
        'about',
        'basic_price',
        'basic_description',
        'standard_price',
        'standard_description',
        'premium_price',
        'premium_description',
        'images'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function love()
    {
        return $this->hasMany(Love::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
