<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    // use HasFactory;
    protected $table = 'Perusahaan';
    protected $fillable = ['nama', 'group', 'status', 'koor_latitude', 'lokasi', 'kebutuhan', 'jenis', 'tipe_customer', 'dilayani', 'penyalur', 'pelayanan'];
}
