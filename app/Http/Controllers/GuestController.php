<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class GuestController extends Controller
{
    public function dokumenIndex()
    {
        $data = JenisDokumen::all();
        return view('pages.dokumen.index', compact(['data']));
    }

    public function dokumenDetail(Request $request, $slug)
    {
        $jenis = JenisDokumen::where('nama', $slug)->first();
        return view('pages.dokumen.show', compact(['jenis', 'slug']));
    }

    public function show($nama_file)
    {
        $getFolderPath = substr($nama_file, 0, 5);
        return response()->file('storage/' . $getFolderPath . '/' . $nama_file);
    }

    public function getDokumen($slug)
    {
        $jenisDokumen = JenisDokumen::where('nama', $slug)->first();
        $query = Dokumen::where('no_jenis_dokumen', $jenisDokumen->no)->with(['jenisDokumen', 'kegiatan', 'unit'])->get();
        return Datatables::of(
            $query
        )
            ->addColumn('aksi', 'pages.dokumen.action')
            ->make(true);
    }
}
