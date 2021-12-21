<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AccountLayout extends Component
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
        $account = Auth::guard('account')->user();
        $AccountServices = $account->Services;

        return view('layouts.Account' ,
        [
            'Services' => $AccountServices,
        ]);
    }
}
