<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GuestController extends Controller
{
    public function dokumenIndex($slug)
    {
        $jenis = JenisDokumen::where('nama', $slug)->first();
        $data = Dokumen::where('no_jenis_dokumen', $jenis->no)->with('jenisDokumen', 'kegiatan', 'unit')->paginate(15);
        return view('pages.dokumen', compact(['data', 'jenis']));
    }

    public function show($nama_file)
    {
        $getFolderPath = substr($nama_file, 0, 5);
        return response()->file('storage/' . $getFolderPath . '/' . $nama_file);
    }

    public function getDokumen()
    {
        return Datatables::of(
            Dokumen::with('jenisDokumen', 'kegiatan', 'unit')
        )
            ->addColumn('aksi', 'pages.admin.dokumen.action')
            ->make(true);
    }
}
