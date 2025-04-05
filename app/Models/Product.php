<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'brand_id',
        'slug', // تأكد إن ده موجود
        // أي حقول أخرى
    ];
    public function  category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function  brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    
}