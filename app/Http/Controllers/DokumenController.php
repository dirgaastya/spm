<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\Helpers\Helper;
use App\JenisDokumen;
use App\Http\Requests;
use App\Kegiatan;
use App\Unit;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DokumenController extends Controller
{
    public function index()
    {
        return view('pages.admin.dokumen.index');
    }

    public function getDocument()
    {
        return Datatables::of(
            Dokumen::with(['jenisDokumen', 'kegiatan', 'unit'])->get()
        )
            ->addColumn('aksi', 'pages.admin.dokumen.action')
            ->make(true);
    }

    public function create()
    {
        $jenis = JenisDokumen::all();
        $unit = Unit::all();
        $kegiatan = Kegiatan::all();
        return view('pages.admin.dokumen.create', compact(['jenis', 'unit', 'kegiatan']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'dokumen' => 'required|mimetypes:application/pdf|max:10000',
            'jenis' => 'required',
            'kegiatan' => 'required',
            'unit' => 'required',
            'status' => 'required',
        ]);

        $data = null;

        try {
            DB::transaction(function () use ($request, &$data) {
                $no = IdGenerator::generate(['table' => 'dokumens', 'field' => 'no', 'length' => 8, 'prefix' => 'DOK-']);
                if ($request->hasFile('dokumen')) {
                    $prefixDate = Helper::getPrefixDateNow();
                    $getFileName = Helper::getFileNamePdf($request);
                    $path = $request->file('dokumen')->storeAs('public/' . $prefixDate, $getFileName);
                } else {
                    $getFileName = 'unknown.pdf';
                }


                $data = new Dokumen();
                $data->no = $no;
                $data->nama = $request->nama;
                $data->nama_file = $getFileName;
                $data->no_jenis_dokumen = $request->jenis;
                $data->no_kegiatan = $request->kegiatan;
                $data->no_unit = $request->unit;
                $data->status = $request->status;
                $data->save();
            });
            return redirect()->route('dokumen.create')->with('alert-success', 'Data berhasil Disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('dokumen.create')->with('alert-danger', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $jenis = JenisDokumen::all();
        $unit = Unit::all();
        $kegiatan = Kegiatan::all();
        $data = Dokumen::findOrFail($id);
        return view('pages.admin.dokumen.edit', compact(['jenis', 'unit', 'kegiatan', 'data']));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_jenis_dokumen' => 'required',
            'no_kegiatan' => 'required',
            'no_unit' => 'required',
            'status' => 'required',
        ]);

        try {
            $data = Dokumen::findOrFail($id);
            if ($request->hasFile('dokumen')) {
                $prefixDate = Helper::getPrefixDate($data->nama_file);
                $getFileName = Helper::getFileNamePdf($request);
                if (!empty($data->nama_file)) {
                    unlink('storage/' . $prefixDate . '/' . $data->nama_file);
                    $path = $request->file('dokumen')->storeAs('public/' . $prefixDate, $getFileName);
                }
            } else {
                $getFileName = Helper::getFileNamePdf($request);
                $prefixDate =  Helper::getPrefixDate($data->nama_file);
                $filePath = $prefixDate . '\\';
                if ($getFileName !== $data->nama_file) {
                    Storage::disk('public')->move($filePath . $data->nama_file, $filePath . $getFileName);
                }
            }
            $data->update(['nama_file' => $getFileName]);
            $data->update($request->all());
            return redirect()->route('dokumen.index')->with('alert-success', 'Data berhasil Diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('dokumen.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function show($nama_file)
    {
        $prefixDate = Helper::getPrefixDate($nama_file);
        return response()->file('storage/' . $prefixDate . '/' . $nama_file);
    }

    public function destroy($id)
    {
        $data = Dokumen::findOrFail($id);
        $prefixDate = Helper::getPrefixDate($data->nama_file);
        unlink('storage/' . $prefixDate . '/' . $data->nama_file);
        $data->destroy($id);
        return redirect()->route('dokumen.index')->with('alert-danger', 'Data berhasil Dihapus.');
    }
}
