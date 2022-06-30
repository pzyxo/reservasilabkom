<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\ReservasiModel;

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
        $userModel = new UserModel();
        $idses = session()->get('id');
        $data =
            [
                'item' => $userModel->getDetail($idses),
                'page' => "explore",
            ];
        return view('users/explore', $data);
    }

    public function about()
    {
        $data =
        [
            'page' => "about",
        ];
        return view('users/about', $data);
    }

    public function profile()
    {
        $data =
        [
            'page' => "profile",
        ];
        return view('users/profile', $data);
    }


}
