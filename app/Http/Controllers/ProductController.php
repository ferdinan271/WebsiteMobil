<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    // Tampilkan seluruh produk
    public function index()
    {
        return view('dashboard.products.index', [
            'products' => Product::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    // Form Tambah Produk
    public function create(): Response
    {
        return response()->view('dashboard.products.form');
    }

    // Fungsi Menambah Produk
    public function store(ProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $create = Product::create($validated);

        if ($create) {
            session()->flash('success', 'Product created successfully!');
            return redirect()->route('products.index');
        }
        session()->flash('error', 'Failed to create product!');

        return abort(500);
    }

    // Tampilkan Detail Produk
    public function show(string $id): Response
    {
        return response()->view('dashboard.products.show', [
            'product' => Product::findOrFail($id),
        ]);
    }

    // Form Edit Produk
    public function edit(string $id): Response
    {
        return response()->view('dashboard.products.form', [
            'product' => Product::findOrFail($id),
        ]);
    }

    // Fungsi Update Produk
    public function update(ProductRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();

        $update = $product->update($validated);

        if ($update) {
            session()->flash('success', 'Product updated successfully!');
            return redirect()->route('products.index');
        }

        session()->flash('error', 'Failed to update product!');
        return abort(500);
    }

    // Hapus Produk
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $delete = $product->delete($id);

        if ($delete) {
            session()->flash('success', 'Product deleted successfully!');
            return redirect()->route('products.index');
        }
        session()->flash('error', 'Failed to delete product!');

        return abort(500);
    }
}