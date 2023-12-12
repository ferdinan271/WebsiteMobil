<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    // Tampilkan seluruh produk
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    // Form Tambah Produk
    public function create(): Response
    {
        return response()->view('dashboard.users.form');
    }

    // Fungsi Menambah Produk
    // public function store(UserRequest $request): RedirectResponse
    // {
    //     $validated = $request->validated();

    //     $create = User::create($validated);

    //     if ($create) {
    //         session()->flash('success', 'User created successfully!');
    //         return redirect()->route('users.index');
    //     }
    //     session()->flash('error', 'Failed to create user!');

    //     return abort(500);
    // }

    // Tampilkan Detail Produk
    public function show(string $id): Response
    {
        return response()->view('dashboard.users.show', [
            'user' => User::findOrFail($id),
        ]);
    }

    // Form Edit Produk
    public function edit(string $id): Response
    {
        return response()->view('dashboard.users.form', [
            'user' => User::findOrFail($id),
        ]);
    }

    // Fungsi Update Produk
    // public function update(UserRequest $request, string $id): RedirectResponse
    // {
    //     $user = User::findOrFail($id);
    //     $validated = $request->validated();

    //     $update = $user->update($validated);

    //     if ($update) {
    //         session()->flash('success', 'User updated successfully!');
    //         return redirect()->route('users.index');
    //     }

    //     session()->flash('error', 'Failed to update user!');
    //     return abort(500);
    // }

    // Hapus Produk
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $delete = $user->delete($id);

        if ($delete) {
            session()->flash('success', 'User deleted successfully!');
            return redirect()->route('users.index');
        }
        session()->flash('error', 'Failed to delete user!');

        return abort(500);
    }
}