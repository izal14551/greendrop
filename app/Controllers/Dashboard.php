<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\TimbangModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->has('user')) {
            return redirect()->to('/auth/login');
        }

        $pesertaModel = new PesertaModel();
        $timbangModel = new TimbangModel();

        // === Statistik ===
        $totalPeserta   = $pesertaModel->countAllResults();
        $totalSampah    = $timbangModel->getTotalSampah();
        $totalTransaksi = $timbangModel->getTotalTransaksi();

        // === Grafik ===
        $tahun = date("Y");
        $dataTimbang = $timbangModel->getPerolehanBulanan($tahun);

        $labels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        $kertas = array_fill(1, 12, 0);
        $kardus = array_fill(1, 12, 0);

        foreach ($dataTimbang as $row) {
            if ($row['jenis'] == 'kertas') {
                $kertas[$row['bulan']] = (float)$row['total'];
            } elseif ($row['jenis'] == 'kardus') {
                $kardus[$row['bulan']] = (float)$row['total'];
            }
        }

        // === Ranking Bulan Ini ===
        $ranking = $timbangModel->getRankingBulanIni();

        $data = [
            'labels'         => json_encode($labels),
            'kertas'         => json_encode(array_values($kertas)),
            'kardus'         => json_encode(array_values($kardus)),
            'ranking'        => $ranking,
            'totalPeserta'   => $totalPeserta,
            'totalSampah'    => $totalSampah,
            'totalTransaksi' => $totalTransaksi
        ];

        return view('dashboard/index', $data);
    }
}
