<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\Barang;
use App\Models\supplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(Request $request)
{
    $query = Pembelian::with(['barang', 'supplier']);

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->whereHas('barang', function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%');
        })->orWhereHas('supplier', function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%');
        });
    }

    $pembelians = $query->latest()->get(); // atau ->paginate()

    return view('pembelian.index', compact('pembelians'));
}

    public function create()
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();
        return view('pembelian.create', compact('barangs', 'suppliers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required',
        'supplier_id' => 'required',
        'jumlah' => 'required|integer|min:1',
        'tanggal' => 'required|date',
    ]);

    // Simpan data pembelian
    $pembelian = Pembelian::create($request->all());

    // Tambahkan jumlah ke stok barang
    $barang = \App\Models\Barang::find($request->barang_id);
    if ($barang) {
        $barang->stok += $request->jumlah;
        $barang->save();
    }

    return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan dan stok diperbarui.');
}

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus.');
    }

    public function selesai($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->status = 'Done';
        $pembelian->save();

        return redirect()->route('pembelian.index')->with('success', 'Status pembelian berhasil diselesaikan.');
    }

}