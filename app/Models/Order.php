<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'medicine_name',
        'quantity',
        'customer_name',
        'phone_number',
        'address',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
