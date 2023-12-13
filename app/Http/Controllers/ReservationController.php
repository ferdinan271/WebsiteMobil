<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ReservationController extends Controller
{

    // public function create(): Response
    // {
    //     $user = auth()->user();
    //     $timeList = [
    //         "08:00",
    //         "09:00",
    //         "10:00",
    //         "11:00",
    //         "12:00",
    //         "13:00",
    //         "14:00",
    //         "15:00",
    //         "16:00",
    //     ];
    //     return response()->view('form', [
    //         'user' => $user,
    //         'products' => Product::orderBy('category', 'asc')->get(),
    //         'times' => $timeList,
    //     ]);
    // }

    public function index($selectedProduct = null)
    {
        $timeList = [
            "08:00",
            "09:00",
            "10:00",
            "11:00",
            "12:00",
            "13:00",
            "14:00",
            "15:00",
            "16:00",
        ];
        return view('reservations.index', [
            'monthlyProducts' => Product::where('category', 'Monthly')->orderBy('price', 'asc')->get(),
            'dailyProducts' => Product::where('category', 'Daily')->orderBy('price', 'asc')->get(),
            'times' => $timeList,
            'selectedProduct' => $selectedProduct,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'merk' => 'required',
                'type' => 'required',
                'plate_number' => 'required',
                'reservation_date' => 'required',
                'reservation_time' => 'required|min:2',
                'product_id' => 'required',
                'message' => '',
            ]
        );

        $validated['price'] = Product::find($validated['product_id'])->price;
        $reservation = Reservation::create($validated);
        if ($reservation) {
            session()->flash('success', 'Reservation Success!');
            return redirect()->route('home');
        }
        session()->flash('error', 'Failed to create reservation!');

        return abort(500);
    }

    public function delete($id)
    {
        $reservation = Reservation::findOrFail($id);

        $delete = $reservation->delete($id);

        if ($delete) {
            session()->flash('success', 'Reservation deleted successfully!');
            return redirect()->route('dashboard');
        }
        session()->flash('error', 'Failed to delete reservation!');

        return abort(500);
    }

    public function edit($id)
    {
        $timeList = [
            "08:00",
            "09:00",
            "10:00",
            "11:00",
            "12:00",
            "13:00",
            "14:00",
            "15:00",
            "16:00"
        ];
        return response()->view('dashboard.reservations.form', [
            'reservation' => Reservation::findOrFail($id),
            'products' => Product::where('category', 'Daily')->orderBy('price', 'asc')->get(),
            'times' => $timeList,
        ]);
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        $reservation = Reservation::findOrFail($id);
        $validated = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'merk' => 'required',
                'type' => 'required',
                'plate_number' => 'required',
                'reservation_date' => 'required',
                'reservation_time' => 'required|min:2',
                'product_id' => 'required',
                'price' => 'required|integer',
                'status' => 'required',
                'message' => '',
            ]
        );

        $update = $reservation->update($validated);

        if ($update) {
            session()->flash('success', 'Product updated successfully!');
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'Failed to update product!');
        return abort(500);
    }
}
