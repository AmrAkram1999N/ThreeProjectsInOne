<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use App\Models\File;
use App\Models\Folder;
use App\Models\SubFolder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class FileController extends Controller
{

    protected $saving_folder = '/other_files/';
    protected $extension = '';
    protected $mimes = '';
    protected $account;
    protected $array_folder_content = [];
    protected $array_DB = [];
    protected $file_name;
    protected $array_folder = [];
    protected $array_Folder_DB = [];
    protected $folder;
    protected $Extension_Array = [
        'png' => "fas fa-file-image fs-5",
        'jpg' => "fas fa-file-image fs-5",
        'doc' => "fas fa-file-word text-primary fs-5",
        'docx' => "fas fa-file-word text-primary fs-5",
        'pdf' => "fas fa-file-pdf text-danger fs-5",
        'xlsx' => "fas fa-file-excel text-success fs-5",
        'xls' => "fas fa-file-excel text-success fs-5",
        'txt' => "fas fa-file-alt text-secondary fs-5",
        'exe' => "fas fa-cogs",
    ];
    protected $filePath;

    use UploadTrait;

    //Uploading Folders and Files

    public function Upload(Request $request, Response $response,$folder_path)
    {

        $time = Carbon::now();
        $time_saved = Carbon::create($time->year, $time->month, $time->day, $time->hour, $time->minute);

        $this->account = Auth::guard('account')->user();

        if ($request->hasFile('file_request')) {

            $Files = $request->file('file_request');

            foreach ($Files as $file) {

                $extension_file = strtolower($file->getClientOriginalExtension());

                foreach ($this->Extension_Array as $Extension => $folder_array) {

                    if ($extension_file === $Extension) {

                        $this->saving_folder = $folder_array;

                        $DB_Path = $this->StoringFiles($file, $this->account, $time_saved, $folder_path);

                        $size = $this->convert_Uploaded_File_To_Human_Readable($file);

                        $DB = $this->Saving_DB($file, $DB_Path, $size, $folder_path, $extension_file);

                    } elseif (!array_key_exists($extension_file, $this->Extension_Array)) {

                        $this->saving_folder = '/other_files/';

                        $DB_Path = $this->StoringFiles($file, $this->account, $time_saved, $folder_path);
                    }
                }
            }
        }

        return back();
    }

    public function StoringFiles($file, $account, $time_saved, $folder_path)
    {
        if ($folder_path !== "fileManagerService") {
            $folder_path = str_replace("_", "/", $folder_path) ;
        } else { $folder_path = "";}

        if ($file->isValid()) {

            $this->file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '_(' . Str::slug($time_saved) . ')';

            $this->folder = 'Accounts/' . Str::slug($account->username) . '/fileManagerService/' . $folder_path . '/';

            $this->filePath = '/Storage/' . $this->folder . $this->file_name . '.' . $file->getClientOriginalExtension();

            $this->uploadOne($file, $this->folder, 'uploads', $this->file_name);
        }

        return $this->filePath;
    }

    public function Saving_DB($file, $path, $size, $folder_path, $type)
    {
        if ($folder_path == "fileManagerService") {
            $File = File::create([
                'folder_id',
                'account_id' => $this->account->id,
                'main_folder' => "fileManagerService",
                'file_path_db' => "fileManagerService",
                'folder_path_directory' => '/Storage/' . $this->folder,
                'file_path_directory' => $this->filePath,
                'file_name' => $this->file_name,
                'file_type' => $type,
                'file_size' => $size,
                'icon' => $this->saving_folder,
                'number_of_files' => +1,
            ]);
            return $File;
        } else {
            $Folder = SubFolder::where('folder_path', $folder_path)->first();

            if ($Folder !== null) {
                $id = $Folder->Folder->id;

            } else {
                $id = Folder::where('folder_path', $folder_path)->first()->id;
            }
            $previous_URL = substr(URL::previous() ,62,1000);

            $File = File::create([
                'folder_id' => $id,
                'account_id' => $this->account->id,
                'main_folder' => $folder_path,
                'file_path_db' => $previous_URL . '_' .$this->file_name .".". $type,
                'folder_path_directory' => '/Storage/' . $this->folder,
                'file_path_directory' => $this->filePath,
                'file_name' => $this->file_name,
                'file_type' => $type,
                'file_size' => $size,
                'icon' => $this->saving_folder,
                'number_of_files' => +1,
            ]);
            return $File;
        }
    }

    public function convert_Uploaded_File_To_Human_Readable($file, $precision = 2)
    {
        $size = $file->getSize();
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }
}

