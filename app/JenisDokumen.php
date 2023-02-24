<?php

namespace App;

use App\Dokumen;
use Illuminate\Database\Eloquent\Model;

class JenisDokumen extends Model
{
    protected $table = 'jenis_dokumens';
    protected $primaryKey = 'no';
    public $incrementing = false;
    protected $fillable = [
        'no', 'nama'
    ];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'no_jenis_dokumen');
    }
}
