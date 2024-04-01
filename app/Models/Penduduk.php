<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\PendudukSubKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function penduduk_sub_kriteria()
    {
        return $this->hasMany(PendudukSubKriteria::class, 'penduduk_id', 'id');
    }
}