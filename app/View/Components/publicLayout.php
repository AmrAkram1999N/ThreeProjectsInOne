<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class publicLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $line = Auth::guard('account')->check();
        if($line == true)
        {
            $link = route('Chain.Account.Auth.accountProfile');
            $link2 = route('Chain.Account.Auth.accountDashboard');
        }else
        {
            $link = route('Chain.User.Auth.userProfile');
            $link2 = route('Chain.User.Auth.userDashBoard');
        }

        return view('layouts.public-layout',[
            'linkpage' => $link,
            'linkpaged' => $link2
        ]);
    }
}
