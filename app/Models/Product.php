<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Thêm Model ở đây


class Product extends Model 
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name_product',
        'id_category',
        'price',
        'quantity',
        'long_description',
        'highlight',
        'product_specification',
        'image', 
        'updated_at',
    ];


}
