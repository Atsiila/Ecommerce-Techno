<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'total',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
