<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_employee',
        'name_service',
        'phone_number',
        'username',
        'password',
        'user_id',
        'account_id',
    ];

    protected $attributes = [
        'name_employee' => 'amrakram',
    ];


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function Account()
    {
        return $this->belongsTo(Account::class,'account_id','id');
    }

}
