<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $primaryKey = 'no';
    public $incrementing = false;
    protected $fillable = [
        'no', 'nama'
    ];

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'no_unit');
    }
}
