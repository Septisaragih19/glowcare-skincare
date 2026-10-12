<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Halaman Katalog Pengguna
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Halaman Khusus Dashboard Admin
    public function adminDashboard()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Akses khusus Admin!');
        }

        $products = Product::latest()->get();
        return view('admin.dashboard', compact('products'));
    }

    // Fungsi Tambah Produk
    public function store(Request $request)
{
    $request->validate([
        'name'     => 'required',
        'price'    => 'required|numeric',
        'image'    => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        'category' => 'nullable|string',
    ]);

    $imagePath = $request->file('image')->store('products', 'public');

    Product::create([
        'name'        => $request->name,
        'brand'       => $request->brand ?? 'GlowCare.',
        'price'       => $request->price,
        'category'    => $request->category ?? 'Pembersih Wajah',
        'description' => $request->description,
        'image'       => $imagePath,
    ]);

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');

    }

    // Fungsi Hapus Produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    // Fungsi Kirim Konsultasi
    public function sendConsultation(Request $request)
    {
        $nomorWa = '6289674359829';
        $namaUser = auth()->user()->name;
        
        $pesan = "Halo Admin dreama., saya *{$namaUser}* ingin konsultasi:\n\n";
        $pesan .= "📌 *Produk:* {$request->product_name}\n";
        $pesan .= "👤 *Tipe Kulit:* {$request->skin_type}\n";
        $pesan .= "📝 *Catatan AI Scan:* {$request->complaint}\n";

        if ($request->hasFile('face_photo')) {
            $path = $request->file('face_photo')->store('consultations', 'public');
            $pesan .= "\n📷 *Foto Wajah:* " . asset('storage/' . $path);
        }

        return redirect()->away("https://wa.me/{$nomorWa}?text=" . rawurlencode($pesan));
    }
}