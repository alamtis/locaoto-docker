<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setPassword($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
