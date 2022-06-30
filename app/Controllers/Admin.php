<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReservasiModel;
use App\Models\UserModel;
use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $reservasiModel;
    protected $adminModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->reservasiModel = new ReservasiModel();
        $this->adminModel = new AdminModel();
    }

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

    public function getdata()
    {
        if ($this->request->isAJAX()) {
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

    public function detailReservasi($id)
    {
        $reservasiModel = new ReservasiModel();
        $data =
            [
                'page' => "reservation",
                'item' => $reservasiModel->getDetail($id),
            ];
        return view('admin/reservation/detail', $data);
    }

    public function acceptUsers($id)
    {
        $input = [
            'status' => 1,
        ];
        $this->userModel->update($id, $input);
        $pesan = [
            'sukses' => 'User berhasil diverifikasi'
        ];
        session()->setFlashdata('suksesAccept', 'Berhasil verifikasi akun');
        
        return redirect()->to(base_url('/admin/users/'. $id));
    }

    public function acceptReservation($reservasiID)
    {
        $input = [
            'statusReservasi' => 1,
        ];
        $this->reservasiModel->update($reservasiID, $input);
        session()->setFlashdata('suksesreservasi', 'Berhasil verifikasi reservasi');
        
        return redirect()->to(base_url('/admin/reservation/' . $reservasiID));
    }

    
}
