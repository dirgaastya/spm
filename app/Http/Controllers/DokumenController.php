<?php

namespace App\Http\Controllers;

use App\User;
use App\Dokumen;

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
                $date = Carbon::now()->format('Y-m');
                $getPrefixDate = substr($date, 2);
                $slugFileName = Str::slug($request->nama);
                if ($request->hasFile('dokumen')) {
                    $extension = $request->file('dokumen')->getClientOriginalExtension();
                    $filename = $getPrefixDate . '-' . $slugFileName . '.' . $extension;
                    $path = $request->file('dokumen')->storeAs('public/' . $getPrefixDate, $filename);
                } else {
                    $filename = 'unknown.pdf';
                }

                $data = new Dokumen();
                $data->no = $no;
                $data->nama = $request->nama;
                $data->nama_file = $filename;
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

    public function show($nama_file)
    {
        $getFolderPath = substr($nama_file, 0, 5);
        $getPath = storage_path();
        return response()->file('storage/' . $getFolderPath . '/' . $nama_file);
    }

    public function destroy($id)
    {
        Dokumen::destroy($id);
        return redirect()->route('dokumen.index')->with('alert-danger', 'Data berhasil Dihapus.');
    }
}
