<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
