<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArtCode;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $artCodes = ArtCode::all(); // Mengambil semua Art Code untuk dropdown
        return view('product.create', compact('artCodes'));
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'art_code' => 'required|string|max:255',
            'date' => 'required|date',
            'product' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'qty_in' => 'required|integer|min:0',
            'qty_out' => 'required|integer|min:0',
            'sisa' => 'required|integer|min:0',
            'exp_batch' => 'required|string|max:255',
            'pbf' => 'required|string|max:255',
        ]);

        // Menyimpan produk baru dengan art_code yang dipilih
        Product::create($validated);

        // Redirect ke halaman lain setelah penyimpanan sukses
        return redirect()->route('home')->with('success', 'Product created successfully.');
    }

    // Menampilkan daftar produk
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search')) {
            $query->where('product', 'like', '%' . $request->search . '%');
        }

        $products = $query->get(); // Atau gunakan paginate() jika ingin pagination

        return view('product.index', [
            'products' => $products,
            'artCode' => '3078054', // Art code contoh
            'siteCode' => '3201',
            'siteName' => 'GUARDIAN PLAZA INDONESIA',
        ]);
    }

    // Menampilkan produk berdasarkan art_code
    public function show($artCode)
    {
        // Mengambil produk berdasarkan art_code
        $products = Product::where('art_code', $artCode)->get();

        // Mengembalikan tampilan dengan data produk dan artCode
        return view('product.show', compact('products', 'artCode'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Menemukan produk berdasarkan ID
        $artCodes = ArtCode::all(); // Mengambil semua Art Code untuk dropdown
        return view('product.edit', compact('product', 'artCodes'));
    }

    // Menyimpan perubahan produk yang telah diubah
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'art_code' => 'required|string|max:255',
            'date' => 'required|date',
            'product' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'qty_in' => 'required|integer|min:0',
            'qty_out' => 'required|integer|min:0',
            'sisa' => 'required|integer|min:0',
            'exp_batch' => 'required|string|max:255',
            'pbf' => 'required|string|max:255',
        ]);

        // Menemukan produk berdasarkan ID dan memperbarui data
        $product = Product::findOrFail($id);
        $product->update($validated);

        // Redirect ke halaman produk setelah pembaruan sukses
        return redirect()->route('product.show', ['artCode' => $product->art_code])->with('success', 'Product updated successfully.');
    }

    // Menghapus produk dari database
    public function destroy($id)
    {
        // Menemukan produk berdasarkan ID dan menghapusnya
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect ke halaman produk setelah penghapusan sukses
        return redirect()->route('product.show', ['artCode' => $product->art_code])->with('success', 'Product deleted successfully.');
    }

    public function exportPdf(Request $request)
    {
        // Query for products
        $query = Product::query();

        // Retrieve a specific ArtCode from the database
        $artCode = ArtCode::first(); // or use a specific query like ArtCode::find($id)

        // Search logic for products
        if ($request->has('search')) {
            $query->where('product', 'like', '%' . $request->search . '%');
        }

        // Get the products
        $products = $query->get();

        // Prepare data for PDF
        $data = [
            'products' => $products,
            'artCode' => $artCode, // Pass the ArtCode object
            'siteCode' => '3201',
            'siteName' => 'GUARDIAN PLAZA INDONESIA',
        ];

        // Generate PDF
        $pdf = Pdf::loadView('pdf.products', $data);
        return $pdf->stream('pharmacy-stock-card.pdf');
    }
}
