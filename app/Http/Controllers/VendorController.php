<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.master.vendr.index', [
            'title' => 'Data Master',
            'subtitle' => 'Vendor',
            'vendor' => Vendor::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.master.vendr.create', [
            'title' => 'Data Master',
            'subtitle' => 'Vendor',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'info' => 'nullable',
        ]);

        Vendor::create($validateData);

        return redirect('master/vendor')->with('success', 'Vendor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('menu.master.vendr.edit', [
            'title' => 'Data Master',
            'subtitle' => 'Vendor',
            'vendor' => $vendor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $rules = [
            'alamat' => 'required',
            'kontak' => 'required',
            'info' => 'nullable',
        ];

        if ($request->nama != $vendor->nama) {
            $rules['nama'] = 'required|unique:vendor';
        }

        $validateData = $request->validate($rules);

        Vendor::where('id', $vendor->id)
            ->update($validateData);

        return redirect('master/vendor')->with('success', 'Vendor Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        Vendor::destroy($vendor->id);

        return redirect('master/vendor')->with('success', 'Vendor deleted successfully');
    }
}
