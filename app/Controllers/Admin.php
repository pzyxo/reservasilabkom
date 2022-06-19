<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReservasiModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new ReservasiModel();
        $data =
        [
            'list' => $userModel->findAll(),
            'page' => "users",
        ];
        return view('/admin/users', $data);
    }
}
