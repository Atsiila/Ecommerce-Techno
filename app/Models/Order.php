<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\User;
use App\Models\Transaksi;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_produk',
        'jumlah',
        'tanggal',
        'status'
    ];

    protected $visible = [
        'id_user',
        'id_produk',
        'jumlah',
        'tanggal',
        'status'
    ];

    protected $timetamps = true;

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


}