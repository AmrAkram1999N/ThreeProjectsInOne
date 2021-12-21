<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackService extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'telegramUsername',
        'telegram_id',
        'clientname',
        'clientnumber',
        'status',
    ];

    public function Account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id')->withDefault();
    }
}
