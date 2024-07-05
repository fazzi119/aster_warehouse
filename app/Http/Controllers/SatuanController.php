<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.master.satuan.index', [
            'title' => 'Data Master',
            'subtitle' => 'Satuan',
            'satuan' => Satuan::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.master.satuan.create', [
            'title' => 'Data Master',
            'subtitle' => 'Satuan',
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

        Satuan::create($validateData);

        return redirect('master/satuan')->with('success', 'Satuan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('menu.master.satuan.edit', [
            'title' => 'Data Master',
            'subtitle' => 'Satuan',
            'satuan' => $satuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $rules = [
            'info' => 'nullable',
        ];

        if ($request->nama != $satuan->nama) {
            $rules['nama'] = 'required|unique:satuan';
        }

        $validateData = $request->validate($rules);

        Satuan::where('id', $satuan->id)
            ->update($validateData);

        return redirect('master/satuan')->with('success', 'Satuan Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        Satuan::destroy($satuan->id);

        return redirect('master/satuan')->with('success', 'Satuan deleted successfully');
    }
}
