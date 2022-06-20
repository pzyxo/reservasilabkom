<?php

namespace App\Controllers;

class Account extends BaseController
{
    public function login()
    {
        return view('login/login');
    }

    public function register()
    {
        return view('login/register');
    }
}
