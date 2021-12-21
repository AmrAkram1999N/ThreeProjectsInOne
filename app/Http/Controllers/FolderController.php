<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use App\Models\Folder;
use App\Models\SubFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class FolderController extends Controller
{
    public function Create_Folder(Request $request, $Root, $result = false)
    {

        $account = Auth::guard('account')->user();

        $request->validate([
            'folder_name' => ['required', 'regex:/^[a-zA-Z]+$/u']
        ]);

        if($Root == "fileManagerService")
        {
            $File_Storage_Path = $this->Setting_Path_Folder($account, $Root, $request->folder_name);

            $result = $this->Creating_Directory($File_Storage_Path, $result);

            $previous_URL = substr($this->URL() ,41,1000);

            if($result)
            {
                $Folder = $this->Creating_Folder($account,$request,$File_Storage_Path,$Root, $previous_URL);
            }else
            {
                return $this->Folder_Already_Created($request);
            }
        }else
        {
            $previous_URL = substr($this->URL() ,62,1000);

            $directory_path =  str_replace("_", "/", $previous_URL);

            $File_Storage_Path = $this->Setting_Path_Folder($account, 'fileManagerService/'.$directory_path, $request->folder_name);

            $result = $this->Creating_Directory($File_Storage_Path, $result);

            if($result)
            {
                $Folder = $this->Creating_Sub_Folder($account,$request,$File_Storage_Path,$Root, $previous_URL);
            }else
            {
                return $this->Folder_Already_Created($request);
            }

        }
        return back();
    }

    public function Setting_Path_Folder($account, $Root, $folder)
    {
        return $File_Storage_Path = public_path() . '/Storage/Accounts/' . Str::slug($account->username) . '/' . $Root . '/' . $folder;
    }

    public function Creating_Directory($File_Storage_Path, $result)
    {
        if (!File::isDirectory($File_Storage_Path))
        {
            return $result = File::makeDirectory($File_Storage_Path, 0777, true, true);
        }
    }

    public function Creating_Sub_Folder($account, $request,$File_Storage_Path,$Root,$previous_URL)
    {

        $Folder = $account->Folders->where('folder_path',$previous_URL)->first();
        if($Folder !== null)
        {
            $id = $Folder->id;
        }else
        {
            $id = SubFolder::where('folder_path', $Root)->first()->Folder->id;
        }

        $Sub_Folder = SubFolder::create([
            'folder_id' => $id,
            'account_id' => $account->id,
            'main_folder' => $previous_URL,
            'folder_path' => $previous_URL .'_' .$request->folder_name,
            'directory_path' => $File_Storage_Path,
            'folder_name' => $request->folder_name,
            'folder_size',
            'icon' => "folder",
            'number_of_folders' => +1,
        ]);

        return $Folder;
    }
    public function Creating_Folder($account, $request,$File_Storage_Path,$Root,$previous_URL)
    {
        $Folder = Folder::create([
            'account_id' => $account->id,
            'main_folder' => $Root,
            'folder_path' => $request->folder_name,
            'directory_path' => $File_Storage_Path,
            'folder_name' => $request->folder_name,
            'folder_size',
            'icon' => "folder",
            'number_of_folders' => +1,
        ]);

        return $Folder;
    }

    public function URL()
    {
        return $previous_URL = URL::previous();
    }

    public function Folder_Already_Created($request)
    {
        return redirect(
            route('Chain.Account.Auth.fileManagerService')
        )->with(
            'warning',
            "$request->folder_name folder is already created!"
        );
    }

    public function Open_Folder(Request $request, $folder_path)
    {
        $account = Auth::guard('account')->user();

        $Sub_Folder = $account->Sub_Folders->where('main_folder', $folder_path);

        $Files = $account->Files->where('main_folder', $folder_path);

        // $Sub_Folder = Sub_Folder::where('main_folder', $folder_path)->get();

        return view('ProjectNew.Folders', [
            'account' => $account,
            'Sub_Folders' => $Sub_Folder,
            'Folder_Path' => $folder_path,
            'Files' => $Files,

        ]);
    }
}
