<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukKriteria extends Model
{
    use HasFactory;

    protected $table = 'penduduk_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}