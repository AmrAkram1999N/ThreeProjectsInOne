<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable =[
        'folder_id',
        'account_id',
        'main_folder',
        'file_path_db',
        'folder_path_directory',
        'file_path_directory',
        'file_name',
        'file_type',
        'file_size',
        'icon',
        'number_of_files',
    ];

    public function Folder()
    {
        return $this->belongsTo(Folder::class,'folder_id','id');
    }

    public function Account()
    {
        return $this->belongsTo(Account::class,'account_id','id');
    }
}
