<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumens';
    protected $primaryKey = 'no';
    public $incrementing = false;
    protected $fillable = [
        'no', 'nama', 'nama_file', 'kegiatan', 'status', 'unit', 'no_jenis_dokumen'
    ];


    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'no_jenis_dokumen');
    }
}
