<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'web_site_name',
        'url_new',
        'url_old',
        'clicks',
        'account_id',
    ];

    protected $hidden =[
        'account_id',
        'id'
    ];
    protected $appends =[
        'clicks_number',
    ];

    public function Account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
    //Short_Link->clicks_number
    public function getClicksNumberAttribute()
    {
        return $this->clicks;
    }
}
