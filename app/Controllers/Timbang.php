<?php

namespace App\Controllers;

use App\Models\TimbangModel;
use App\Models\PesertaModel;
use CodeIgniter\Controller;

class Timbang extends BaseController
{
    protected $timbangModel;
    protected $pesertaModel;

    public function __construct()
    {
        $this->timbangModel = new TimbangModel();
        $this->pesertaModel = new PesertaModel();
    }

    public function index()
    {
        $data['timbang'] = $this->timbangModel->orderBy('id', 'DESC')->findAll();
        return view('timbang/create', $data);
    }

    public function store()
    {
        $this->timbangModel->save([
            'nik'     => $this->request->getPost('nik'),
            'nama'    => $this->request->getPost('nama'),
            'alamat'  => $this->request->getPost('alamat'),
            'jenis'   => $this->request->getPost('jenis'),
            'berat'   => $this->request->getPost('berat'),
            'tanggal' => $this->request->getPost('tanggal'),
            'tukar'   => $this->request->getPost('tukar'),
        ]);

        return redirect()->to('/timbang')->with('success', 'Data transaksi berhasil ditambahkan');
    }

    // 🔎 Ambil data peserta berdasarkan NIK (AJAX)
    public function getPeserta()
    {
        $nik = $this->request->getGet('nik');
        $peserta = $this->pesertaModel->where('nik', $nik)->first();

        return $this->response->setJSON($peserta ?? []);
    }
}
