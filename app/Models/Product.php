<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'tax',
        'meta_keywords',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
    public function wishlist(){
        return $this->belongsTo(Wishlist::class,'id','prod_id');
    }
}
