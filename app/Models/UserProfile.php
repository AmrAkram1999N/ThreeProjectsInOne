<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'fullname',
        'username',
        'bio',
        'email',
        'password',
        'user_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
