<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primaryKey = "jadwal_id";

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id'); //id guru fk
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran_model::class, 'pelajaran_id');
    }

    public function list_jadwal()
    {
        $query = DB::table('jadwal')
            ->leftjoin('guru', 'guru.guru_id', '=', 'jadwal.guru_id')
            ->leftjoin('pelajaran', 'pelajaran.pelajaran_id', '=', 'jadwal.pelajaran_id')
            ->leftjoin('hari', 'hari.hari_id', '=', 'jadwal.hari_id')
            ->select('jadwal.*', 'guru.nama_guru', 'pelajaran.nama_pelajaran', 'hari.nama_hari')
            ->get();
        return $query;
    }
}
