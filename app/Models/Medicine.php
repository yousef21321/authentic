<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'photo',
        'medicine_name',
        'price',
        'description',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
