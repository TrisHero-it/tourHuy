<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryChild extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'category_childs';

    protected $fillable = [
        'name',
        'image',
        'status',
        'slug',
        'category_id',
        'hidden_money'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getCountTourAttribute()
    {
        return Tour::where('category_child_id', $this->id)->count();
    }
}
