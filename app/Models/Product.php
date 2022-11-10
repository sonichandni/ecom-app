<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'description'
    ];

    public function variant() {
        return $this->hasOne(ProductVariant::class, 'product_id', 'id');
    }
}
