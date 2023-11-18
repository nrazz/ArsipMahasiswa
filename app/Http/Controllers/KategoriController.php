<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    // method untuk menampilkan kategori
    public function kategoritampil(Request $request)
    {
        $search = $request->input('q');
        $datakategori = Kategori::when($search, function ($query) use ($search) {
            return $query->where('nama_kategori', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('kategori', ['kategori' => $datakategori, 'search' => $search]);
    }

    // method untuk tambah kategori
    public function kategoritambah(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori = Kategori::create([
            'id' => $request->id,
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        if ($kategori) {
            Session::flash('success', 'Kategori berhasil ditambahkan!');
        } else {
            Session::flash('error', 'Gagal menambahkan kategori.');
        }

        return redirect('/kategori');
    }

    // method menghapus data kategori
    public function kategorihapus($id)
    {
        $datakategori = Kategori::find($id);

        if ($datakategori) {
            $datakategori->delete();
            Session::flash('success', 'Kategori berhasil dihapus!');
        } else {
            Session::flash('error', 'Gagal menghapus kategori.');
        }

        return redirect()->back();
    }

    // method untuk edit data kategori
    public function kategoriedit($id, Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $kategori = Kategori::find($id);

        if ($kategori) {
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'keterangan' => $request->keterangan,
            ]);

            Session::flash('success', 'Kategori berhasil diubah!');
        } else {
            Session::flash('error', 'Gagal mengubah kategori.');
        }

        return redirect()->back();
    }
}
