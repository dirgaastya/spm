<?php

namespace App\Http\Controllers;

use App\Dokumen;
use App\JenisDokumen;

use App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class JenisDokumenController extends Controller
{
    public function index()
    {
        return view('pages.admin.jenis-dokumen.index');
    }

    public function getJenisDokumen()
    {
        return Datatables::of(
            JenisDokumen::all()
        )

            ->addColumn('thumbnail', 'pages.admin.jenis-dokumen.thumbnail')
            ->addColumn('aksi', 'pages.admin.jenis-dokumen.action')
            ->make(true);
    }

    public function create()
    {
        return view('pages.admin.jenis-dokumen.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'thumbnail' => 'required'
        ]);

        $data = null;

        try {
            DB::transaction(function () use ($request, &$data) {
                $no = IdGenerator::generate(['table' => 'jenis_dokumens', 'field' => 'no', 'length' => 8, 'prefix' => 'JD-']);
                if ($request->hasFile('thumbnail')) {
                    $extension =  $request->file('thumbnail')->getClientOriginalExtension();
                    $getFileName = Str::slug($request->nama) . '.' . $extension;
                    $storePath = $request->file('thumbnail')->storeAs('public/thumbnails/', $getFileName);
                } else {
                    $getFileName = 'unknown.jpg';
                }

                $data = new JenisDokumen();
                $data->no = $no;
                $data->nama = $request->nama;
                $data->thumbnail = $getFileName;
                $data->save();
            });
            return redirect()->route('jenis-dokumen.index')->with('alert-success', 'Data berhasil Disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('jenis-dokumen.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = JenisDokumen::findOrFail($id);
        return view('pages.admin.jenis-dokumen.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        try {
            $data = JenisDokumen::findOrFail($id);
            if ($request->hasFile('thumbnail')) {
                if (!empty($data->thumbnail)) {
                    unlink('storage/thumbnails/' . $data->thumbnail);
                }
                $extension =  $request->file('thumbnail')->getClientOriginalExtension();
                $getFileName = Str::slug($request->nama) . '.' . $extension;
                $storePath = $request->file('thumbnail')->storeAs('public/thumbnails/', $getFileName);
            } else {
                $extension =  $request->file('thumbnail')->getClientOriginalExtension();
                $getFileName = Str::slug($request->nama) . '.' . $extension;
                Storage::disk('public')->move('thumbnails\\' . $data->nama_file, 'thumbnails\\' . $getFileName);
            }
            $data->update(['thumbnail' => $getFileName]);
            $data->update($request->all());

            return redirect()->route('jenis-dokumen.index')->with('alert-success', 'Data berhasil Diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('jenis-dokumen.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $data = JenisDokumen::findOrFail($id);
        unlink('storage/thumbnails/' . $data->thumbnail);
        $data->destroy($id);
        return redirect()->route('jenis-dokumen.index')->with('alert-danger', 'Data berhasil Dihapus.');
    }

    public function guestIndex($id, Request $request)
    {
        $data = Dokumen::where('no_jenis_dokumen', $id)
            ->with('jenisDokumen')
            ->paginate(15);
        return view('pages.dokumen', compact('data'));
    }
}
