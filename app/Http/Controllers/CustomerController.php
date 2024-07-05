<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.master.customer.index', [
            'title' => 'Data Master',
            'subtitle' => 'Customer',
            'customer' => Customer::latest()->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.master.customer.create', [
            'title' => 'Data Master',
            'subtitle' => 'Customer',
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

        Customer::create($validateData);

        return redirect('master/customer')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('menu.master.customer.edit', [
            'title' => 'Data Master',
            'subtitle' => 'Customer',
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'alamat' => 'required',
            'kontak' => 'required',
            'info' => 'nullable',
        ];

        if ($request->nama != $customer->nama) {
            $rules['nama'] = 'required|unique:customer';
        }

        $validateData = $request->validate($rules);

        Customer::where('id', $customer->id)
            ->update($validateData);

        return redirect('master/customer')->with('success', 'Customer Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);

        return redirect('master/customer')->with('success', 'Customer deleted successfully');
    }
}
