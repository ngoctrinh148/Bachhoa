<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'ward',
        'district',
        'city',
        'status',
        'message',
        'total_price',
        'tracking_no',
    ];
    public function orderitems(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function users(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id','id');
    }

}
