<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\JenisDokumen;

class JenisDokumenController extends Controller
{
    public function index()
    {
        $data = JenisDokumen::paginate(10);
        return view('pages.admin.jenis-dokumen.index', compact('data'));
    }
    public function guestIndex($id, Request $request)
    {
        $data = Dokumen::where('no_jenis_dokumen', $id)
            ->with('jenisDokumen')
            ->paginate(15);
        return view('pages.dokumen', compact('data'));
    }
}
