<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [

        'name',
        'image',
        'slug',
        'description',
        'price',
        'discount',
        'stock',
        'sub_category_id',
        'cart_id',
        'wishlist_id',
        'brand_id',
        'section_id',
    ];
public function brand(){
    return $this->belongsTo(Brand::class);
}
public function section(){
    return $this->belongsTo(Section::class);
}
public function images()
{
    return $this->hasMany(product_images::class);
}
public function subCategory()
{
    return $this->belongsTo(sub_category::class);
}
public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
public function carts()
{
    return $this->hasMany(Cart::class);
}
}
