<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{

    protected $fillable = [
        'nama', 'kegiatan', 'status', 'unit', 'id_kategori'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
