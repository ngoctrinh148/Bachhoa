<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address1',
        'address2',
        'ward',
        'district',
        'city',
        'pincode',
        'status',
        'message',
        'total_price',
        'tracking_no',
    ];
    public function orderitems(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
