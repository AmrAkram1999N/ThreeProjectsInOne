<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'photo',
        'username',
        'password',
        'name_employee',
        'phone_number',
        'account_id',
    ];

    public function Account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }}
