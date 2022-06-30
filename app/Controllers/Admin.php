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
        $userModel = new UserModel();
        $data =
        [
            'list' => $userModel->findAll(),
            'page' => "users",
        ];
        return view('/admin/users/users', $data);
    }

    public function reservation()
    {
        $reservasiModel = new ReservasiModel();
        $data =
            [
                'list' => $reservasiModel->findAll(),
                'page' => "reservation",
            ];
        return view('/admin/reservation/reservation', $data);
    }

    public function getReserv()
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
    public function users()
    {
        $userModel = new UserModel();
        $data =
        [
            'list' => $userModel->findAll(),
            'page' => "users",
        ];
        return view('/admin/users/users', $data);
    }
    public function getdata(){
        if($this->request->isAJAX()){
            $userModel = new UserModel();
            $data = [
                'list' => $userModel->findAll(),
            ];

            $hasil = [
                'data' => view('/admin/users/users', $data)
            ];
            echo json_encode($hasil);
        } else {
            exit("Data tidak dapat diload");
        }
    }

    public function detail($id){
        $data = 
        [
            'page' => "users",
            'item' => $this->userModel->getDetail($id),
        ];
        return view('admin/users/detail', $data);
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

    // status reservasi =
    // 0 = pending
    // 1 = disetujui
    // 2 = dibatalkan
    // 3 = selesai

    public function acceptReservation($reservasiID)
    {
        $input = [
            'statusReservasi' => 1,
        ];
        $this->reservasiModel->update($reservasiID, $input);
        session()->setFlashdata('suksesreservasi', 'Berhasil verifikasi reservasi');
        
        return redirect()->to(base_url('/admin/reservation/' . $reservasiID));
    }

    public function cancelReservation($reservasiID)
    {
        $input = [
            'statusReservasi' => 2,
        ];
        $this->reservasiModel->update($reservasiID, $input);
        session()->setFlashdata('batalreservasi', 'Berhasil batalkan reservasi');
        
        return redirect()->to(base_url('/admin/reservation/' . $reservasiID));
    }

    public function finishReservation($reservasiID)
    {
        $input = [
            'statusReservasi' => 3,
        ];
        $this->reservasiModel->update($reservasiID, $input);
        session()->setFlashdata('finishreservasi', 'Berhasil selesaikan reservasi');
        
        return redirect()->to(base_url('/admin/reservation/' . $reservasiID));
    }

}
