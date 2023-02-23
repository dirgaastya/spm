<?php

namespace App;

use App\Dokumen;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama'
    ];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_kategori');
    }
}
