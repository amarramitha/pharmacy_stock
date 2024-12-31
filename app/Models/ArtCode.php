<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtCode extends Model
{
    use HasFactory;

    protected $table = 'art_codes';

    protected $fillable = ['site_code', 'site_name', 'art_code', 'rsp', 'q_sell_suggest'];

    public function products()
    {
        return $this->hasMany(Product::class, 'art_code', 'art_code');
    }
}

