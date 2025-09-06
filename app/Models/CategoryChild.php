<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryChild extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'category_childs';
    
}
