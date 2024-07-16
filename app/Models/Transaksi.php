<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_order',
        'total',
        'status'
    ];

    protected $visible = [
        'id_order',
        'total',
        'status'
    ];

    protected $timetamps = true;

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

}