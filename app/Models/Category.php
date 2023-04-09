<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Product;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    
    protected $fillable=['name', 'status', 'show_in_menu', 'parent_id', 'short_description', 'description', 'thumbnail_image', 'banner_image', 'is_featured', 'url_key'];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
}
