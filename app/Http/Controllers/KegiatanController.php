<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('pages.admin.kegiatan.index');
    }

    public function getKegiatan()
    {
        return Datatables::of(
            Kegiatan::all()
        )
            ->addColumn('aksi', 'pages.admin.kegiatan.action')
            ->make(true);
    }

    public function create()
    {
        return view('pages.admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $data = null;

        try {
            DB::transaction(function () use ($request, &$data) {
                $no = IdGenerator::generate(['table' => 'kegiatans', 'field' => 'no', 'length' => 8, 'prefix' => 'KG-']);
                $data = new Kegiatan();
                $data->no = $no;
                $data->nama = $request->nama;
                $data->save();
            });
            return redirect()->route('kegiatan.index')->with('alert-success', 'Data berhasil Disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('kegiatan.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Kegiatan::findOrFail($id);
        return view('pages.admin.kegiatan.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $data = Kegiatan::findOrFail($id);

        try {
            DB::transaction(function () use ($request, &$data) {
                $data->update($request->all());
            });
            return redirect()->route('kegiatan.index')->with('alert-success', 'Data berhasil Diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('kegiatan.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Kegiatan::destroy($id);
        return redirect()->route('kegiatan.index')->with('alert-danger', 'Data berhasil Dihapus.');
    }
}
