<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    
    protected $table = 'category';

    protected $fillable = [
        'name_category',

    ];
    use HasFactory;

    // public $timestamps = false;
}