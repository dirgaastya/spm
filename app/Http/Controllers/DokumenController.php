<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;

use App\Http\Requests;

class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::with('jenisDokumen')->paginate(10);
        return view('pages.admin.dokumen.index', compact('data'));
    }

    public function create()
    {
        return view('pages.admin.dokumen.create');
    }

    public function store(Request $request)
    {
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
