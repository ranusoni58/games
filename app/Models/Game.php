<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recharge;


class Game extends Model
{

    use HasFactory;
    protected $fillable = [
        'image'
    ];
   
   
}
