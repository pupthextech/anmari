<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_name',
        'category_desc',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true;
}
