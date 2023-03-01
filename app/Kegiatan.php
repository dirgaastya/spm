<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatans';
    protected $primaryKey = 'no';
    public $incrementing = false;
    protected $fillable = [
        'no', 'nama'
    ];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'no_kegiatan');
    }
}
