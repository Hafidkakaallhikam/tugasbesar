<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Supplier::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('alamat', 'like', '%' . $request->search . '%')
                ->orWhere('kode_pos', 'like', '%' . $request->search . '%');
        }

        $data = $query->get();

        return view('supplier.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // VALIDASI data
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'kode_pos' => 'required|max:10',
        ]);

        // SIMPAN data ke database
        Supplier::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
        ]);

        // Redirect balik dengan pesan sukses
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supplier $supplier)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'kode_pos' => 'required|max:10',
        ]);

        // Mengupdate data supplier
        $supplier->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos,
        ]);

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus!');
    }
}
