<?php

namespace App\Controllers;

use App\Models\PesertaModel;

class Peserta extends BaseController
{
    public function index()
    {
        $model = new PesertaModel();
        $data['peserta'] = $model->findAll();

        return view('peserta/index', $data);
    }

    public function create()
    {
        return view('peserta/create');
    }

    public function store()
    {
        $model = new PesertaModel();

        $validation = $this->validate([
            'nik' => [
                'rules' => 'required|is_unique[peserta.nik]',
                'errors' => [
                    'required' => 'NIK wajib diisi',
                    'is_unique' => 'NIK sudah terdaftar, gunakan NIK lain'
                ]
            ],
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->insert([
            'nik'    => $this->request->getPost('nik'),
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/peserta')->with('success', 'Peserta berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new PesertaModel();
        $data['peserta'] = $model->find($id);

        if (!$data['peserta']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Peserta dengan ID $id tidak ditemukan");
        }

        return view('peserta/edit', $data);
    }

    public function update($id)
    {
        $model = new PesertaModel();

        $validation = $this->validate([
            'nik' => [
                'rules' => "required|is_unique[peserta.nik,id,{$id}]",
                'errors' => [
                    'required'  => 'NIK wajib diisi',
                    'is_unique' => 'NIK sudah terdaftar, gunakan NIK lain'
                ]
            ],
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model->update($id, [
            'nik'    => $this->request->getPost('nik'),
            'nama'   => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        return redirect()->to('/peserta')->with('success', 'Peserta berhasil diperbarui');
    }

    public function delete($id)
    {
        $model = new PesertaModel();
        $model->delete($id);

        return redirect()->to('/peserta')->with('success', 'Peserta berhasil dihapus');
    }
}
