<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class account extends Authenticatable
{
    
    protected $table = 'account';

    protected $primaryKey = 'id'; 
    

    use HasFactory;
}
