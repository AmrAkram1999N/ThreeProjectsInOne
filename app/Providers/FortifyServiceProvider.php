<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Account;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $request = request();
        if($request->is('Chain/Account/*'))
        {
            Config::set('fortify.guard','account');
            Config::set('fortify.prefix','Chain/Account');
            Config::set('fortify.home','Chain/Account/Auth/accountDashboard');
            Config::set('fortify.username', 'username');
        }else
        {
            Config::set('fortify.guard','web');
            Config::set('fortify.prefix','Chain/User');
            Config::set('fortify.home','Chain/User/Auth/userDashBoard');
            Config::set('fortify.username', 'email');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::resetPasswordView(function ($request) {

            return view('auth.reset-password', ['request' => $request]);
        });



        Fortify::authenticateUsing(function (Request $request) {

            $account = Account::where('username', $request->username)->first();

            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password))
            {
                Auth::guard('web')->login($user);
                return $user;
            }

            if ($account && Hash::check($request->password, $account->password))
            {
                Auth::guard('account')->login($account);
                return $account;
            }
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::viewPrefix('auth.');
        // Fortify::loginView('auth.login');
        // Fortify::registerView('auth.register');
        // Fortify::requestPasswordResetLinkView('auth.forgot-password');
    }
}
