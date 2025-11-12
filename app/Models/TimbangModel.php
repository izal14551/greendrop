<?php

namespace App\Models;

use CodeIgniter\Model;

class TimbangModel extends Model
{
    protected $table      = 'timbang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nik',
        'nama',
        'alamat',
        'jenis',
        'berat',
        'tanggal',
        'tukar'
    ];
    public function getPerolehanBulanan($tahun)
    {
        return $this->select("MONTH(tanggal) as bulan, jenis, SUM(berat) as total")
            ->where("YEAR(tanggal)", $tahun)
            ->groupBy("bulan, jenis")
            ->orderBy("bulan", "ASC")
            ->findAll();
    }

    public function getRankingBulanIni()
    {
        $bulan = date('m');
        $tahun = date('Y');

        return $this->select("nama, SUM(berat) as total")
            ->where("MONTH(tanggal)", $bulan)
            ->where("YEAR(tanggal)", $tahun)
            ->groupBy("nama")
            ->orderBy("total", "DESC")
            ->findAll();
    }

    public function getTotalSampah()
    {
        return $this->selectSum('berat')->get()->getRow()->berat ?? 0;
    }

    public function getTotalTransaksi()
    {
        return $this->countAllResults();
    }
}
