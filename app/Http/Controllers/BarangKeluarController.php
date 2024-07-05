<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Baris;
use App\Models\Nomor;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Satuan;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Kategori;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Events\BarangKeluarEvent;
use App\Rules\CheckStockQuantity;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.barang_keluar.index', [
            'title' => 'Barang Keluar',
            'barangKeluar' => BarangKeluar::latest('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.barang_keluar.create', [
            'title' => 'Barang Keluar',
            'customer' => Customer::all(),
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
        // dibawah ini untuk merequest data semuanya
        // $barangKeluar = BarangKeluar::create($request->all());

        $validateData = $request->validate([
            'barang_id' => 'required',
            'rak_id' => 'required',
            'nomor_id' => 'required',
            'baris_id' => 'required',
            'vendor_id' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'tgl_keluar' => 'required|date',
            'qty' => 'required|numeric',
            'customer_id' => 'required|exists:customer,id',
            'info' => 'nullable|string',
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
            // Jika ditemukan, kurangi jumlah di Gudang dan buat data baru di BarangKeluar
            if ($existingGudang->jumlah >= $validateData['qty']) {
                $existingGudang->jumlah -= $validateData['qty'];
                $existingGudang->save();
                BarangKeluar::create($validateData);
            } else {
                return redirect()->back()->with('error', 'Jumlah barang di gudang tidak mencukupi');
            }
        } else {
            return redirect()->back()->with('error', 'Data barang tidak ditemukan di gudang');
        }

        return redirect('barangkeluar')->with('success', 'Barang keluar berhasil ditambahkan');
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
        return view('menu.barang_keluar.edit', [
            'title' => 'Barang Keluar',
            'barangkeluar' => BarangKeluar::findOrFail($id),
            'gudang' => Gudang::all(),
            'customer' => Customer::all(),
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);

        // Cari data gudang dengan kriteria yang sama
        $existingGudang = Gudang::where('barang_id', $barangKeluar->barang_id)
            ->where('rak_id', $barangKeluar->rak_id)
            ->where('nomor_id', $barangKeluar->nomor_id)
            ->where('baris_id', $barangKeluar->baris_id)
            ->where('vendor_id', $barangKeluar->vendor_id)
            ->where('kategori_id', $barangKeluar->kategori_id)
            ->where('satuan_id', $barangKeluar->satuan_id)
            ->first();

        if ($existingGudang) {
            // Kembalikan stok ke gudang
            $existingGudang->jumlah += $barangKeluar->qty;
            $existingGudang->save();

            // Hapus data barang_keluar
            $barangKeluar->delete();

            return redirect('barangkeluar')->with('success', 'Stok berhasil dikembalikan ke gudang');
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

    public function getGudang(Request $request)
    {
        $search = $request->input('q');
        $data = Gudang::whereHas('barang', function ($query) use ($search) {
            $query->where('nama', 'LIKE', "%$search%");
        })->get();
        return response()->json($data);
    }
}
