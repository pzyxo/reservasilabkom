<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data =
        [
            'list' => $userModel->findAll(),
            'page' => "users",
        ];
        return view('/user/users', $data);
    }
}
