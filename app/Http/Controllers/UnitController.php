<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UnitController extends Controller
{
    public function index()
    {
        return view('pages.admin.unit.index');
    }

    public function getUnit()
    {
        return Datatables::of(
            Unit::all()
        )
            ->addColumn('aksi', 'pages.admin.unit.action')
            ->make(true);
    }

    public function create()
    {
        return view('pages.admin.unit.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $data = null;

        try {
            DB::transaction(function () use ($request, &$data) {
                $no = IdGenerator::generate(['table' => 'units', 'field' => 'no', 'length' => 8, 'prefix' => 'UN-']);
                $data = new Unit();
                $data->no = $no;
                $data->nama = $request->nama;
                $data->save();
            });
            return redirect()->route('unit.index')->with('alert-success', 'Data berhasil Disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('unit.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = Unit::findOrFail($id);
        return view('pages.admin.unit.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        $data = Unit::findOrFail($id);

        try {
            DB::transaction(function () use ($request, &$data) {
                $data->update($request->all());
            });
            return redirect()->route('unit.index')->with('alert-success', 'Data berhasil Diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('unit.index')->with('alert-danger', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Unit::destroy($id);
        return redirect()->route('unit.index')->with('alert-danger', 'Data berhasil Dihapus.');
    }
}
