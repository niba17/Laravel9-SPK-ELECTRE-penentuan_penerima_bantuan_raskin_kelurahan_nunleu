<?php

namespace App\Models;

use App\Models\Penduduk;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukSubKriteria extends Model
{
    use HasFactory;

    protected $table = 'penduduk_sub_kriteria';
    protected $guarded = ['id'];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}