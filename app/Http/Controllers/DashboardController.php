<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('updated_at', 'desc')->get();
        $waiting = Reservation::where('status', 'Menunggu Konfirmasi')->count();
        $antrian = Reservation::where('status', 'Antrian')->count();
        $income = Reservation::where('status', 'Selesai')->sum('price');


        return view('dashboard.dashboard', [
            'reservations' => $reservations,
            'waiting' => $waiting,
            'antrian' => $antrian,
            'income' => $income,
        ]);
    }
}
