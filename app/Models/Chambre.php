<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    protected $fillable = ['hotel_id', 'type', 'equipements', 'disponibilite'];

    // A chambre belongs to a hotel
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
