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

    public function jadwal()
    {
        $reservasiModel = new ReservasiModel();
        if ($this->request->isAJAX()) {
            $data = [
                'list' => $reservasiModel->findAll(),
            ];

            $hasil = [
                'data' => view('/users/explore/jadwal', $data)
            ];
            echo json_encode($hasil);
        } else {
            echo json_encode("Data tidak dapat diload");
        }
    }

    public function about()
    {
        $data =
        [
            'page' => "about",
        ];
        return view('users/about', $data);
    }

    public function login()
    {
        $data =
            [
                'page' => "login",
            ];
        return view('users/login/login', $data);
    }

    public function register()
    {
        return view('users/login/register');
    }


}
