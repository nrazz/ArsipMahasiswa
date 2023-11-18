<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Support\Facades\Session; // Tambahkan use statement untuk Session

class ArsipController extends Controller
{
    // method untuk menampilkan arsip
    // method untuk menampilkan arsip
    public function arsiptampil(Request $request)
    {
        $query = Arsip::query();
        $kategorii = Kategori::all();
    
        // Cek apakah terdapat parameter pencarian
        if ($request->has('q')) {
            $keyword = $request->input('q');
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', '%' . $keyword . '%');
            });
        }
    
        $dataarsip = $query->paginate(5);
    
        return view('arsip', ['arsip' => $dataarsip, 'kategori' => $kategorii]);
    }


    // method untuk tambah arsip
    public function arsiptambah(Request $request)
    {
        $arsip = new Arsip;
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->nama_kategori = $request->nama_kategori;
        $arsip->judul = $request->judul;
        if ($request->hasFile('berkas')) {
            $berkasFile = $request->file('berkas');
            $berkasFileName = time() . '_' . $berkasFile->getClientOriginalName();
            $berkasFile->move(public_path('berkas'), $berkasFileName);
            $arsip->berkas = $berkasFileName;
    }
        $arsip->save();

        if ($arsip) {
            Session::flash('success', 'Barang berhasil ditambahkan!');
        } else {
            Session::flash('error', 'Gagal menambahkan barang.');
        }

        return redirect('/arsip');
    }

    // method menghapus data arsip
    public function arsiphapus($nomor_surat)
    {
        $dataarsip = Arsip::find($nomor_surat);

        if ($dataarsip) {
            $dataarsip->delete();
            Session::flash('success', 'Barang berhasil dihapus!');
        } else {
            Session::flash('error', 'Gagal menghapus barang.');
        }

        return redirect()->back();
    }

    // method untuk edit data arsip
    public function arsipedit($nomor_surat, Request $request)
{
    $arsip = Arsip::find($nomor_surat);
    
    if ($arsip) {
        $arsip->nama_kategori = $request->nama_kategori;
        $arsip->judul = $request->judul;

        // Cek apakah ada berkas yang diunggah
        if ($request->hasFile('berkas')) {
            $berkasFile = $request->file('berkas');
            $berkasFileName = time() . '_' . $berkasFile->getClientOriginalName();
            $berkasFile->move(public_path('berkas'), $berkasFileName);

            // Hapus berkas lama jika ada
            if ($arsip->berkas) {
                unlink(public_path('berkas/' . $arsip->berkas));
            }

            $arsip->berkas = $berkasFileName;
        }

        $arsip->save();
        
        Session::flash('success', 'Arsip berhasil diubah!');
    } else {
        Session::flash('error', 'Arsip tidak ditemukan.');
    }

    return redirect()->back();
}
public function arsipLihat($nomor_surat)
{
    $surat = Arsip::where('nomor_surat', $nomor_surat)->first();
    return view('lihat', compact('surat'));
}

}