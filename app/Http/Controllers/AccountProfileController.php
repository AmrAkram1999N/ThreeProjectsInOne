<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadTrait;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountProfileController extends Controller
{
    use UploadTrait;

    public function ChangePhoto(Request $request)
    {
        $account = Auth::guard('account')->user();

        $AccountProfile = $account->Account_Profile;

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');

            if ($photo->isValid()) {
                $name = Str::slug($account->username) . '_' . time();

                $folder = '/Accounts/' . Str::slug($account->username) . '/Account_Profile/Profile_Images/';

                $filePath = '/Storage' . $folder . $name . '.' . $photo->getClientOriginalExtension();

                $this->uploadOne($photo, $folder, 'uploads', $name);

                $AccountProfile->photo = $filePath;

            }
        }

        $AccountProfile->save();

        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }

    public function update(Request $request)
    {
        $account = Auth::guard('account')->user();
        $id = Auth::guard('account')->id();
        $AccountProfile = $account->Account_Profile;
        $Service = $account->User->where('account_id', $AccountProfile->id);
        // $Service = Service::where('account_id', $AccountProfile->id)->get();

        $request->validate([
            'name_employee' => ['required', 'string', 'max:15'],
            'phone_number' => ['required', 'string', 'size:10'],
            'username' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'max:15'],

        ]);

        if ($request->username !== $AccountProfile->username) {
            $request->validate(
                ['username' =>
                    ['required', 'string', 'max:15', "unique:account_profiles,username,$id"]]);

            $AccountProfile->update([
                'username' => strtolower($request->username),
            ]);

            $account->update(['username' => strtolower($request->username)]);

            foreach ($Service as $service) {

                $service->update(['username' => strtolower($request->username)]);
            }
        }

        if ($request->phone_number !== $AccountProfile->phone_number) {

            $request->validate(
                ['phone_number' =>
                    ['required', 'string', 'max:10', "unique:account_profiles,phone_number,$id"]]);

            $AccountProfile->update([
                'phone_number' => $request->phone_number,
            ]);

            foreach ($Service as $service) {

                $service->update(['phone_number' => $request->phone_number]);
            }
        }

        if ($request->name_employee !== $AccountProfile->name_employee) {
            $AccountProfile->update([
                'name_employee' => $request->name_employee,
            ]);
            $account->update(['name' => $request->name_employee]);
            $account->update(['name_employee' => $request->name_employee]);

            foreach ($Service as $service) {
                $service->update(['name_employee' => $request->name_employee]);
            }
        }

        if ($request->password !== $AccountProfile->password) {
            $AccountProfile->update([
                'password' => $request->password,
            ]);
            $account->update(['password' => Hash::make($request->password)]);

            foreach ($Service as $service) {
                $service->update(['password' => $request->password]);
            }
        }

        return redirect(route('accountProfile'));
    }
}
