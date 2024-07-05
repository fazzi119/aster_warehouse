<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Baris;
use App\Models\Nomor;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Satuan;
use App\Models\Vendor;
use App\Models\Kategori;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.barang_masuk.index', [
            'barangmasuk' => BarangMasuk::latest()->get(),
            'title' => 'Barang masuk',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.barang_masuk.create', [
            'title' => 'Barang Masuk',
            'subtitle' => 'Barang Masuk',
            'barang' => Barang::all(),
            'rak' => Rak::all(),
            'nomor' => Nomor::all(),
            'baris' => Baris::all(),
            'kategori' => Kategori::all(),
            'vendor' => Vendor::all(),
            'satuan' => Satuan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'barang_id' => 'required',
            'rak_id' => 'required',
            'nomor_id' => 'required',
            'baris_id' => 'required',
            'vendor_id' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'qty' => 'required',
            'info' => 'nullable',
        ]);

        // Cari data gudang dengan kriteria yang sama
        $existingGudang = Gudang::where('barang_id', $validateData['barang_id'])
            ->where('rak_id', $validateData['rak_id'])
            ->where('nomor_id', $validateData['nomor_id'])
            ->where('baris_id', $validateData['baris_id'])
            ->where('vendor_id', $validateData['vendor_id'])
            ->where('kategori_id', $validateData['kategori_id'])
            ->where('satuan_id', $validateData['satuan_id'])
            ->first();

        if ($existingGudang) {
            // Jika ditemukan, buat data baru di BarangMasuk dan tambahkan jumlah di Gudang
            BarangMasuk::create($validateData);
            $existingGudang->jumlah += $validateData['qty'];
            $existingGudang->save();
        } else {
            // Jika tidak ditemukan, buat data baru di BarangMasuk dan Gudang
            $barangMasuk = BarangMasuk::create($validateData);
            Gudang::create($validateData + ['jumlah' => $barangMasuk->qty]);
        }

        return redirect('barangmasuk')->with('success', 'Barang masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);

        // Cari data gudang dengan kriteria yang sama
        $existingGudang = Gudang::where('barang_id', $barangMasuk->barang_id)
            ->where('rak_id', $barangMasuk->rak_id)
            ->where('nomor_id', $barangMasuk->nomor_id)
            ->where('baris_id', $barangMasuk->baris_id)
            ->where('vendor_id', $barangMasuk->vendor_id)
            ->where('kategori_id', $barangMasuk->kategori_id)
            ->where('satuan_id', $barangMasuk->satuan_id)
            ->first();

        if ($existingGudang) {
            // Kembalikan stok ke gudang
            $existingGudang->jumlah -= $barangMasuk->qty;
            $existingGudang->save();

            // Hapus data barang_Masuk
            $barangMasuk->delete();

            return redirect('barangmasuk')->with('success', 'Stok berhasil dikembalikan');
        } else {
            return redirect()->back()->with('error', 'Data barang tidak ditemukan di gudang');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
