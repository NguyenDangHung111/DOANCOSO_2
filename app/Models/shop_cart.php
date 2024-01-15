<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop_cart extends Model
{
    use HasFactory;

    protected $table = 'shop_cart';
    protected $primaryKey = 'id';
    public $incrementing = true; 

    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_product',
        'id_account',
        'status',
    ];

}
