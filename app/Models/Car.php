<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_model_id',
        'agency_id',
        'identity',
        'image'
    ];

    public function brandModel()
    {
        return $this->belongsTo(BrandModel::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


}
