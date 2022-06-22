<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data =
        [
            'page' => "",
        ];
        return view('users/index', $data);
    }

    public function explore()
    {
        $data =
        [
            'page' => "explore",
        ];
        return view('users/explore', $data);
    }

}
