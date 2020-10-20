<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TravelPackage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'travel_packages_id','image'
    ];

    public function TravelPackages()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id');
    }
}
