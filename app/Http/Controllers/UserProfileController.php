<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    use UploadTrait;

    public function ChangePhoto(Request $request)
    {
        $user = Auth::guard('web')->user();

        $User_Profile = $user->User_Profile;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($photo->isValid()) {
                $name = Str::slug($user->username) . '_' . time();

                $folder = '/Users/' . Str::slug($user->username) . '/User_Profile/Profile_Images/';

                $filePath = '/Storage' . $folder . $name . '.' . $photo->getClientOriginalExtension();

                $this->uploadOne($photo, $folder, 'uploads', $name);

                $User_Profile->photo = $filePath;
            }
        }

        $User_Profile->save();

        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }

    public function update(Request $request)
    {
        $user = Auth::guard('web')->user();

        $id = Auth::guard('web')->id();

        $User_Profile = $user->User_Profile;

        $request->validate([
            'fullname' => ['required', 'string', 'max:15'],
            'bio' => ['required', 'string', 'max:300'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'max:15'],
        ]);


        if($request->email !== $User_Profile->email )
        {
            $request->validate(
                ['email' =>
                ['required', 'string', 'email','max:15', "unique:user__profiles,email,$id"]]);

            $User_Profile->update([
                'email' => $request->email,
            ]);
            $user->update(['email' => $request->email,]);
        }

        if($request->username !== $User_Profile->username )
        {
            $request->validate(
                ['username' =>
                ['required', 'string','max:15', "unique:user__profiles,username,$id"]]);

            $User_Profile->update([
                'username' => strtolower($request->username),]);

            $user->update(['username' => strtolower($request->username),]);
        }



        if($request->bio !== $User_Profile->bio )
        {
            $User_Profile->update([
                'bio' => $request->bio,
            ]);
        }

        if($request->fullname !== $User_Profile->fullname )
        {
            $User_Profile->update([
                'fullname' => $request->fullname,
            ]);
            $user->update(['name' => $request->fullname,]);
        }

        return redirect(route('userProfile'));
    }
}
