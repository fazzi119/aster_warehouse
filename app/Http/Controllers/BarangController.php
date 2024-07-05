<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Exports\ExportBarang;
use App\Imports\ImportBarang;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.master.barang.index', [
            'title' => 'Data Master',
            'subtitle' => 'Barang',
            'barang' => Barang::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.master.barang.create', [
            'title' => 'Data Master',
            'subtitle' => 'Barang',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'image' => 'required|image|file|max:5120|mimes:jpeg,png,jpg,gif',
            'info' => 'required',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('barang_images');
        }

        Barang::create($validateData);

        return redirect('master/barang')->with('success', 'Barang created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('menu.master.barang.edit', [
            'title' => 'Data Master',
            'subtitle' => 'Barang',
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'nama' => 'required',
            'info' => 'required',
        ];

        if ($request->kode != $barang->kode) {
            $rules['kode'] = 'required|unique:barang';
        }

        $validateData = $request->validate($rules);

        Barang::where('id', $barang->id)
            ->update($validateData);

        return redirect('master/barang')->with('success', 'Barang Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);

        return redirect('master/barang')->with('success', 'Barang deleted successfully');
    }

    public function export()
    {
        return Excel::download(new ExportBarang, 'Barang.xlsx');
    }

    public function import(Request $request)
    {
        $import = Excel::import(new ImportBarang, $request->file('file'));

        return redirect('master/barang')
            ->with($import ? 'success' : 'error', 'Barang ' . ($import ? 'imported' : 'import failed') . ' successfully');
    }

    public function getBarang(Request $request)
    {
        $search = $request->input('q');
        $data = Barang::where('nama', 'LIKE', "%$search%")->get();
        return response()->json($data);
    }
}
