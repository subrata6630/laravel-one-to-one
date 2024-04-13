<?php

namespace App\Http\Controllers;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       return view('addresses.index',[
            'user'  => auth()->user()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            ]);

        $request->user()->address()->create($request->only('address'));

        return redirect()->route('address.index');


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
    public function edit(Address $address)
    {
        return view('addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $request->validate([
            'address' => 'required',
        ]);

        $request->user()->address()->update($request->only('address'));

        return redirect()->route('address.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Address $address)
    {
        $request->user()->address()->delete();

        return redirect()->route('address.index');
    }
}
