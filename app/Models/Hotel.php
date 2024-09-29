<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = ['name', 'description', 'localisation', 'certification'];

    // A hotel has many chambres
    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}
