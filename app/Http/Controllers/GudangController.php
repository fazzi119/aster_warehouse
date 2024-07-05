<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Models\Baris;
use App\Models\Nomor;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Vendor;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('menu.gudang.index', [
            'title' => 'Gudang',
            'gudang' => Gudang::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.gudang.create', [
            'title' => 'Gudang',
            'subtitle' => 'Barang',
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
            'jumlah' => 'required',
            'info' => 'nullable',
        ]);
        // dd($validateData);
        Gudang::create($validateData);

        return redirect('rak')->with('success', 'Gudang added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gudang $gudang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gudang $gudang)
    {
        return view('menu.gudang.edit', [
            'title' => 'Data Master',
            'subtitle' => 'Barang',
            'title' => 'Gudang',
            'gudang' => $gudang,
            'subtitle' => 'Barang',
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
    public function update(Request $request, Gudang $gudang)
    {
        $rules = [
            'barang_id' => 'required',
            'rak_id' => 'required',
            'nomor_id' => 'required',
            'baris_id' => 'required',
            'vendor_id' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'jumlah' => 'required',
            'info' => 'nullable',
        ];

        $validateData = $request->validate($rules);

        Gudang::where('id', $gudang->id)
            ->update($validateData);

        return redirect('rak')->with('success', 'Gudang Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gudang $gudang)
    {
        Gudang::destroy($gudang->id);

        return redirect('rak')->with('success', 'Gudang deleted successfully');
    }
}
