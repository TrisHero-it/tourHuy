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
        'price',
        'image',
        'duration',
        'schedule',
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
}
