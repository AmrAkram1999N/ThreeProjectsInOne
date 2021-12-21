<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // dd(request()->session()->all());
        Validator::make($input, [
            'username' => ['required', 'string', 'max:15', "unique:users,username"],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => strtolower($input['username']),
            'password' => Hash::make($input['password']),
        ]);

         UserProfile::create([
            'fullname' => $user->name,
            'email' => $user->email,
            'username' => strtolower($user->username),
            'password' => $user->password,
            'user_id' => $user->id,
        ]);

        return $user;

    }
}
