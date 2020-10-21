<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title','slug','country','about','featured_event', 'departure_date',
        'language','food','price','type','created_by','duration'
    ];

    public function gallery()
    {
        return $this->hasMany(gallery::class, 'travel_packages_id');
    }
}
