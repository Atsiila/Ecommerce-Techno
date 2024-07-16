<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
       protected $table = 'produks';

    protected $fillable = ['name','deskripsi','harga','stock','id_kategori','image'];

    public function kategoris()
    {
        return $this->BelongsTo(Kategori::class, 'id_kategori');
    }
    
}
