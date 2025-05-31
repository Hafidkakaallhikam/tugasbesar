<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Pembeli::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('alamat', 'like', '%' . $request->search . '%')
              ->orWhere('no_hp', 'like', '%' . $request->search . '%');
    }

    $pembelis = $query->orderBy('id', 'asc')->paginate(10);

    return view('pembeli.index', compact('pembelis'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembeli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        Pembeli::create($request->all());

        return redirect()->route('pembeli.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembeli $pembeli)
    {
        return view('pembeli.edit', compact('pembeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pembeli $pembeli)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $pembeli->update($request->all());

        return redirect()->route('pembeli.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pembeli $pembeli)
    {
        $pembeli->delete();
        return redirect()->route('pembeli.index')->with('success', 'Data berhasil dihapus!');
    }
}
