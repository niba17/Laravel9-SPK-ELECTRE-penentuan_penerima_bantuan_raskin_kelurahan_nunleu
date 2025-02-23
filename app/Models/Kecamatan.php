<?php

namespace App\Models;

use App\Models\Kelurahan;
use App\Models\Penduduk;
use App\Models\KecamatanKelurahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $guarded = ['id'];

    public function kecamatan_kelurahan()
    {
        return $this->hasMany(KecamatanKelurahan::class, 'kecamatan_id', 'id');
    }

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    }

    public function pendududk()
    {
        return $this->hasMany(Penduduk::class, 'kecamatan_id', 'id');
    }
}