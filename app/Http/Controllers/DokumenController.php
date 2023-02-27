<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;

use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::with('jenisDokumen')->paginate(10);
        return view('pages.admin.dokumen.index', compact('data'));
    }

    public function create()
    {
        $data = JenisDokumen::all();
        return view('pages.admin.dokumen.create', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis' => 'required',
            'kegiatan' => 'required',
            'unit' => 'required',
            'status' => 'required',
        ]);

        $data = null;

        try {
            DB::transaction(function () use ($request, &$data) {
                $no = IdGenerator::generate(['table' => 'dokumens', 'field' => 'no', 'length' => 8, 'prefix' => 'DOK-']);
                $date = Carbon::now()->format('Y-m');

                $data = new Dokumen();
                $data->no = $no;
                $data->nama = $request->nama;
                $data->nama_file = substr($date, 2) . '-' . $request->nama;
                $data->no_jenis_dokumen = $request->jenis;
                $data->kegiatan = $request->kegiatan;
                $data->unit = $request->unit;
                $data->status = $request->status;
                $data->save();
            });
            return redirect()->route('dokumen.index')->with('alert-success', 'Data berhasil Disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('dokumen.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function edit($id)
    {
        return view('pages.admin.dokumen.edit');
    }

    public function update($id, Request $request)
    {
    }

    public function destroy($id)
    {
    }
}
