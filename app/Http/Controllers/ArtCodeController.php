<?php

namespace App\Http\Controllers;

use App\Models\ArtCode;
use Illuminate\Http\Request;

class ArtCodeController extends Controller
{
    public function index()
    {
        // Ambil semua ArtCode beserta relasi products
        $artCodes = ArtCode::with('products')->get();
    
        // Kirim data ke view home
        return view('home', compact('artCodes'));
    }
    

    // Menampilkan form untuk membuat art code baru
    public function create()
    {
        return view('art_codes.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'site_code' => 'required|string|max:255',
        'site_name' => 'required|string|max:255',
        'art_code' => 'required|string|max:255',
        'rsp' => 'required|string',
        'q_sell_suggest' => 'required|numeric',
    ]);
    
    // Simpan data
    ArtCode::create($request->all());

    // Redirect ke halaman index dengan notifikasi
    return redirect()->route('home')->with('success', 'Data berhasil disimpan.');
}

    

    // Menampilkan detail satu art code
    public function show(ArtCode $artCode)
    {
        return view('art_codes.show', compact('artCode'));
    }

    // Menampilkan form edit untuk art code
    public function edit(ArtCode $artCode)
    {
        return view('art_codes.edit', compact('artCode'));
    }

    // Memperbarui art code di database
    public function update(Request $request, ArtCode $artCode)
{
    // Validasi input dengan nama kolom yang benar
    $request->validate([
        'art_code' => 'required|string|unique:art_codes,art_code,' . $artCode->id,
        'site_code' => 'required|string',
        'site_name' => 'required|string',
        'rsp' => 'required|string',
        'q_sell_suggest' => 'required|integer', // Pastikan nama kolom sesuai dengan yang ada di database
    ]);

    // Memperbarui data ArtCode
    $artCode->update([
        'art_code' => $request->art_code,
        'site_code' => $request->site_code,
        'site_name' => $request->site_name,
        'rsp' => $request->rsp,
        'q_sell_suggest' => $request->q_sell_suggest, // Pastikan nama kolom sesuai dengan nama yang benar
    ]);

    // Redirect ke halaman home dengan notifikasi
    return redirect()->route('home')->with('success', 'Art Code updated successfully.');
}


    // Menghapus art code dari database
    public function destroy(ArtCode $artCode)
    {
        $artCode->delete();

        return redirect()->route('art_codes.index')->with('success', 'Art Code deleted successfully.');
    }
}
