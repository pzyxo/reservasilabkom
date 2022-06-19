<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ReservasiModel;

class Admin extends BaseController
{
    public function index()
    {
        $reservasiModel = new ReservasiModel();
        $data =
        [
            'list' => $reservasiModel->findAll(),
            'page' => "reservation",
        ];
        return view('/admin/reservation/reservation', $data);
    }

    public function getdata(){
        if($this->request->isAJAX()){
            $reservasiModel = new ReservasiModel();
            $data = [
                'list' => $reservasiModel->findAll(),
            ];

            $hasil = [
                'data' => view('/admin/reservation/reservation', $data)
            ];
            echo json_encode($hasil);
        } else {
            echo json_encode("Data tidak dapat diload");
        }
    }

    public function detailReservasi($email){
        $reservasiModel = new ReservasiModel();
        $data = 
        [
            'page' => "reservation",
            'item' => $reservasiModel->getDetail($email),
        ];
        return view('admin/reservation/detail', $data);
    }
}
