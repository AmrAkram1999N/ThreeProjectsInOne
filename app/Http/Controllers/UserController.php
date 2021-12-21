<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $newAccount;
    protected $Service;

    public function buyMore(Request $request)
    {
        $user = Auth::guard('web')->user();

        $this->Service = Service::where('username', $request->username)->first(); //null

        $input = $request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'username' => ['required', 'string', 'max:25'],
            'password' => ['required', 'confirmed'],
        ]);

        $this->newAccount = Account::where('username', $request->username)->first();

        if ($this->newAccount == null) {
            $this->newAccount = Account::create(
                [
                    'name' => $input['name'],
                    'username' => strtolower($input['username']),
                    'password' => Hash::make($input['password']),
                    'user_id' => Auth::guard('web')->id(),
                ]);

            $newAccountProfile = AccountProfile::create(
                [
                    'username' => $this->newAccount->username,
                    'password' => $this->newAccount->password,
                    'name_employee' => $this->newAccount->name,
                    'account_id' => $this->newAccount->id,
                ]);

            $newServiceAccount = $this->serviceConditions($request, 'create');

        } else {

            $newServiceAccount = $this->serviceConditions($request, 'updateOrCreate');
        }

        return redirect()->route('Chain.User.Auth.userDashBoard');
    }

    public function Enter_Service($username)
    {
        $Account_First = Account::where('username', $username)->first();
        $auth = Auth::guard('account')->login($Account_First);
        return redirect()->route('Chain.Account.Auth.accountProfile');
    }

    public function Delete_Service($username)
    {
        $user = Auth::guard('web')->user();

        $Account = $user->Accounts->where('username', $username)->first();

        $Account->delete();

        return redirect()->route('Chain.Account.Auth.accountProfile');
    }

    public function storeService($name, $service, $username, $password, $account_id, $method)
    {
        if ($method == 'create') {
            $newServiceAccount = Service::create([
                'name_employee' => $name,
                'name_service' => $service,
                // 'phone_number' =>
                'username' => $username,
                'password' => $password,
                'user_id' => Auth::guard('web')->id(),
                'account_id' => $account_id,
            ]);

            return $newServiceAccount;
        } elseif ($method == 'updateOrCreate') {
            $newServiceAccount = Service::updateOrCreate([
                'name_employee' => $name,
                'name_service' => $service,
                // 'phone_number' =>
                'username' => $username,
                'password' => $password,
                'user_id' => Auth::guard('web')->id(),
                'account_id' => $account_id,
            ]);

            return $newServiceAccount;
        }
    }

    public function serviceConditions($request, $method)
    {

        if ($this->Service == null) {
            return $newServiceAccount = $this->storeService($this->newAccount->name, $request->service, $this->newAccount->username, $this->newAccount->password, $this->newAccount->id, $method);
        } else {
            if ($this->Service->user_id == Auth::guard('web')->id()) {
                return $newServiceAccount = $this->storeService($this->newAccount->name, $request->service, $this->newAccount->username, $this->newAccount->password, $this->newAccount->id, $method);
            } else {
                return redirect()->route('Chain.User.Auth.userDashBoard')->with('warning', "This $request->username is already taken!");
            }
        }
    }
}
