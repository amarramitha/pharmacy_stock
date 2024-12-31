<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['art_code', 'date', 'product', 'category', 'qty_in', 'qty_out', 'sisa', 'exp_batch', 'pbf'];

    public function artCode()
    {
        return $this->belongsTo(ArtCode::class, 'art_code');
    }
}

