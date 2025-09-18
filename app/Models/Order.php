<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'status',
        'tour_id',
        'price_now',
        'email'
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
