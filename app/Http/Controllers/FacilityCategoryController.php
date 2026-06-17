<?php

namespace App\Http\Controllers;

use App\Models\FacilityCategory;
use Illuminate\Http\Request;

class FacilityCategoryController extends Controller
{
    // Menampilkan daftar kategori di halaman admin
    public function index()
    {
        $categories = FacilityCategory::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255|unique:facility_categories,name'
        ], [
            'name.required' => 'Nama kategori tidak boleh kosong.',
            'name.unique' => 'Kategori ini sudah ada.'
        ]);

        // Simpan data
        FacilityCategory::create([
            'name' => $request->name
        ]);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Kategori fasilitas berhasil ditambahkan!');
    }

    // Menghapus kategori dari database
    public function destroy($id)
    {
        $category = FacilityCategory::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Kategori fasilitas berhasil dihapus!');
    }
} 