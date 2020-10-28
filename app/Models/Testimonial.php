<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','travel_packages_id','content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function travelpackage()
    {
        return $this->hasOne(TravelPackage::class, 'id', 'travel_packages_id');
    }
}
