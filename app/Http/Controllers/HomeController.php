<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\User;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Gudang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {


        return view('menu.home.index', [
            'title' => 'Dashboard',
            'barangCount' => Gudang::count(),
            'rakCount' => Rak::count(),
            'userCount' => User::count(),
            'masukCount' => BarangMasuk::count(),
            'keluarCount' => BarangKeluar::count(),
        ]);
    }
}
