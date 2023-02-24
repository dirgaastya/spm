<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Kategori;

class KategoriController extends Controller
{
    public function index($id, Request $request)
    {
        $data = Dokumen::where('id_kategori', $id)
            ->with('kategori')
            ->paginate(15);
        return view('pages.dokumen', compact('data'));
    }
}
