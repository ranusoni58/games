<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';


    protected $fillable = ['player_id','recharge_id','game_id','recharge','mobile','email','status','order_id','transaction_id'];
}
