<?php

namespace App\Imports;

use App\Models\Perusahaan;
use Maatwebsite\Excel\Concerns\ToModel;


class PerusahaanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Perusahaan([
            "nama" => $row[0],
            "group" => $row[1],
            "status" => $row[2],
            "koor_latitude" => $row[3],
            "koor_longitude" => $row[4],
            "lokasi" => $row[5],
            "kebutuhan" => $row[6],
            "jenis" => $row[7],
            "tipe_customer" => $row[8],
            "dilayani" => $row[9],
            "penyalur" => $row[10],
            "pelayanan" => $row[11],
        ]);
    }
}
