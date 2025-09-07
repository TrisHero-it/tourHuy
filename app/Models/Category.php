<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'is_nav',
        'is_featured',
        'is_banner'
    ];

    public function getCountTourAttribute()
    {
        return Tour::where('category_id', $this->id)->count();
    }

    public function categoryChild()
    {
        return $this->hasMany(CategoryChild::class, 'category_id', 'id');
    }

    public function tours()
    {
        return $this->hasMany(Tour::class, 'category_id', 'id');
    }
}
