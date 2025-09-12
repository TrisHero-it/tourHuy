<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleMap extends Model
{
    use HasFactory;

    protected $table = 'google_maps';

    protected $fillable = [
        'name',
        'address',
        'map_url',
        'status',
    ];
}
