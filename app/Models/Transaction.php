<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id','user_id','additional_visa'
        ,'transaction_total','transaction_status',''
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function travelpackage()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id');
    }

    public function transaction_detail()
    {
        return $this->hasMany(Transaction_detail::class, 'transaction_id');
    }

}
