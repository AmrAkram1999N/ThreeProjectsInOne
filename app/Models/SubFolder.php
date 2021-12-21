<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFolder extends Model
{
    use HasFactory;

    protected $fillable =[
        'folder_id',
        'account_id',
        'main_folder',
        'folder_path',
        'directory_path',
        'folder_name',
        'folder_size',
        'icon',
        'number_of_folders',
    ];

    public function Folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id','id');
    }

    public function Account()
    {
        return $this->belongsTo(Account::class, 'account_id','id');
    }
}
