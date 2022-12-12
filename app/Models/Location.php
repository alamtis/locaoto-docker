<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function agencies()
    {
        return $this->hasMany(Agency::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
