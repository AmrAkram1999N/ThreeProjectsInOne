<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Laravel\Sanctum\HasApiTokens;

class Account extends User
{
    use HasFactory, HasApiTokens, Authenticatable;

    protected $fillable = [
        'name',
        'telegram_id',
        'username',
        'password',
        'user_id',
    ];

    protected $hidden = [
        'id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Account_Profile()
    {
        return $this->hasOne(AccountProfile::class,'account_id', 'id')->withDefault();
    }

    public function Short_Links()
    {
        return $this->hasMany(ShortLink::class, 'account_id', 'id');
    }

    public function Services()
    {
        return $this->hasMany(Service::class, 'account_id', 'id');
    }


    //File_Manager Relations
    public function Folders()
    {
        return $this->hasMany(Folder::class, 'account_id', 'id');
    }

    public function Files()
    {
        return $this->hasMany(File::class, 'account_id', 'id');
    }

    public function Sub_Folders()
    {
        return $this->hasMany(SubFolder::class, 'account_id', 'id');
    }

    //Back_Services_Cards

    public function Cards()
    {
        return $this->hasOne(BackService::class,'account_id', 'id')->withDefault();
    }
}
