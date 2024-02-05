<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'details';
    protected $fillable = [
        'product_id',
        'prod_qty',
        'id_user',
    ];
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
