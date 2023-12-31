<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        "qty", "produk_id",
    ];

    public function produk(){
        return $this->belongsTo(produk::class);
    }
}
