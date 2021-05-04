<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;
    protected $table = 'event_registration';


    protected $fillable = ['name','mobile_no','address','status','fee','order_id','transaction_id'];
}