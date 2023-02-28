<?php

namespace App\Http\Controllers;

use App\User;
use App\Dokumen;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\JenisDokumen;
use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DokumenController extends Controller
{
    public function index()
    {
        return view('pages.admin.dokumen.index');
    }

    public function getDocument(Request $request)
    {
        return Datatables::of(
            Dokumen::with('jenisDokumen')
        )
            ->addColumn('aksi', 'pages.admin.dokumen.action')
            ->make(true);
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
                    $prefixDate = Helper::getPrefixDate();
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
        $jenis_dokumen = JenisDokumen::all();
        $data = Dokumen::findOrFail($id);
        return view('pages.admin.dokumen.edit', compact(['jenis_dokumen', 'data']));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis' => 'required',
            'kegiatan' => 'required',
            'unit' => 'required',
            'status' => 'required',
        ]);

        try {
            $data = Dokumen::findOrFail($id);
            if ($request->hasFile('dokumen')) {
                $prefixDate = Helper::getPrefixDate();
                $getFileName = Helper::getFileNamePdf($request);
                if (!empty($data->nama_file)) {
                    $getFolderPath = substr($data->nama_file, 0, 5);
                    unlink('storage/' . $getFolderPath . '/' . $data->nama_file);
                    $path = $request->file('dokumen')->storeAs('public/' . $prefixDate, $getFileName);
                }
            } else {
                $getFileName = Helper::getFileNamePdf($request);
                $getFolderPath = substr($data->nama_file, 0, 5);
                $filePath = $getFolderPath . '\\';
                Storage::disk('public')->move($filePath . $data->nama_file, $filePath . $getFileName);
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
        $getFolderPath = substr($nama_file, 0, 5);
        return response()->file('storage/' . $getFolderPath . '/' . $nama_file);
    }

    public function destroy($id)
    {
        $data = Dokumen::findOrFail($id);
        $getFolderPath = substr($data->nama_file, 0, 5);
        unlink('storage/' . $getFolderPath . '/' . $data->nama_file);
        $data->destroy($id);
        return redirect()->route('dokumen.index')->with('alert-danger', 'Data berhasil Dihapus.');
    }
}
