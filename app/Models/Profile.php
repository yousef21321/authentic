<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='profiles';
    protected $fillable = [
        'email',
        'user_id',
        'name',
        'health_condition',
        'address',
        'phone_number',
        'age',
        'gender',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
