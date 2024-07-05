<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.master.kategori.index', [
            'title' => 'Data Master',
            'subtitle' => 'Kategori',
            'kategori' => Kategori::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.master.kategori.create', [
            'title' => 'Data Master',
            'subtitle' => 'Kategori',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'info' => 'nullable',
        ]);

        Kategori::create($validateData);

        return redirect('master/kategori')->with('success', 'Kategori created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('menu.master.kategori.edit', [
            'title' => 'Data Master',
            'subtitle' => 'Kategori',
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'info' => 'nullable',
        ];

        if ($request->nama != $kategori->nama) {
            $rules['nama'] = 'required|unique:kategori';
        }

        $validateData = $request->validate($rules);

        Kategori::where('id', $kategori->id)
            ->update($validateData);

        return redirect('master/kategori')->with('success', 'Kategori Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);

        return redirect('master/kategori')->with('success', 'Kategori deleted successfully');
    }
}