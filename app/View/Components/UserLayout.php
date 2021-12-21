<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $Model = "User";

    public function __construct()
    {
        if (request()->is('Chain/Account/*')) {
            $this->Model = 'Account';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.User',['Model' => $this->Model]);
    }
}
