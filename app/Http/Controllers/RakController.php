<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Gudang;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index()
    {
        $rak = Rak::with('gudang')->get();
        $counts = $rak->map(function ($r) {
            return [
                'id' => $r->id,
                'rak' => $r->rak,
                'count' => $r->gudang->count(),
            ];
        });

        return view('menu.gudang.rak', [
            'title' => 'Gudang',
            'rak' => $counts,
        ]);
    }


    public function view($id)
    {
        // Mendapatkan rak berdasarkan ID
        $rak = Rak::findOrFail($id);

        // Mendapatkan data gudang sesuai dengan rak yang dipilih
        $gudang = Gudang::where('rak_id', $rak->id)->filter(request(['search']))->paginate(10)->withQueryString();

        // Kirim data rak dan data gudang ke view
        return view('menu.gudang.index', [
            'title' => 'Gudang',
            'rak' => $rak,
            'gudang' => $gudang
        ]);
        // dd(['rak' => $rak, 'gudang' => $gudang]);
    }
    public function lihat($id)
    {
        // Mendapatkan rak berdasarkan ID
        $rak = Rak::findOrFail($id);

        // Mendapatkan data gudang sesuai dengan rak yang dipilih
        $gudang = Gudang::where('rak_id', $rak->id)->filter(request(['search']))->paginate(10)->withQueryString();

        // Kirim data rak dan data gudang ke view
        return view('menu.gudang.lihat', [
            'title' => 'Gudang',
            'rak' => $rak,
            'gudang' => $gudang
        ]);
        // dd(['rak' => $rak, 'gudang' => $gudang]);
    }
}
