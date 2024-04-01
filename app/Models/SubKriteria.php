<?php

namespace App\Models;

use App\Models\PendudukSubKriteria;
use App\Models\KriteriaSubKriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria_sub_kriteria()
    {
        return $this->hasMany(KriteriaSubKriteria::class, 'sub_kriteria_id', 'id');
    }

    public function penduduk_sub_kriteria()
    {
        return $this->hasMany(PendudukSubKriteria::class, 'sub_kriteria_id', 'id');
    }
}