<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function login()
    {
        return view('users/login/login');
    }

    public function register()
    {
        return view('users/login/register');
    }
}
