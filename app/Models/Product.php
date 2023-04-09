<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'status',
        'name',
        'sku',
        'image',
        'price',
        'special_price',
        'special_price_from',
        'special_price_to',
        'category',
        'short_description',
        'description',
        'url_key','qty',
        'stock_status'
    ];


    protected $hidden = [
    ];


    public function categories() {
        return $this->belongsToMany(Category::class); //, 'product_categories'
    }
}
