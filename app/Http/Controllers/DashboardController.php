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
        return view('dashboard.dashboard', [
            'reservations' => $reservations,
        ]);
    }
}
