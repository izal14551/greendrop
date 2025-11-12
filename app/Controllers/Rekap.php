<?php

namespace App\Controllers;

use App\Models\TimbangModel;

class Rekap extends BaseController
{
    public function index()
    {
        $timbangModel = new TimbangModel();

        // Ambil input filter dari query string (?tanggal_awal=...&tanggal_akhir=...&jenis=...)
        $tanggalAwal  = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');
        $jenis        = $this->request->getGet('jenis');

        // Mulai query
        $builder = $timbangModel;

        if ($tanggalAwal && $tanggalAkhir) {
            $builder = $builder->where('tanggal >=', $tanggalAwal)
                ->where('tanggal <=', $tanggalAkhir);
        }

        if ($jenis && $jenis !== 'all') {
            $builder = $builder->where('jenis', $jenis);
        }

        // paginate dengan group 'rekap'
        $data['rekap'] = $builder
            ->orderBy('created_at', 'DESC')
            ->paginate(10, 'rekap');
        $data['pager'] = $builder->pager;

        // kirim kembali nilai filter agar tetap tampil di input
        $data['filter'] = [
            'tanggal_awal'  => $tanggalAwal,
            'tanggal_akhir' => $tanggalAkhir,
            'jenis'         => $jenis,
        ];

        return view('rekap/index', $data);
    }
}
