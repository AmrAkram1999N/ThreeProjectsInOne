<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable =[
        'account_id',
        'main_folder',
        'folder_path',
        'directory_path',
        'folder_name',
        'folder_size',
        'icon',
        'number_of_folders',

    ];

    public function Account()
    {
        return $this->belongsTo(Account::class,'account_id','id');
    }

    public function Files()
    {
        return $this->hasMany(File::class,'folder_id','id');
    }

    public function Sub_Folder()
    {
        return $this->hasMany(SubFolder::class,'folder_id','id');
    }
}
