<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'itinerary',
        'price_table',
        'faq',
        'price',
        'image',
        'duration',
        'schedule',
        'transportation',
        'departure_place',
        'status',
        'category_id',
        'price_usd',
        'category_child_id'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function categoryChild()
    {
        return $this->belongsTo(CategoryChild::class, 'category_child_id', 'id');
    }

    public function getHiddenMoneyAttribute()
    {
        return $this->categoryChild->hidden_money;
    }
}
