<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $nextSevenDays = [];
        for ($i = 0; $i < 7; $i++) {
            $nextSevenDays[] = Carbon::now()
                ->addDays($i);
        }
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

        $firstDate = Carbon::now()->startOfDay();
        $lastDate = Carbon::now()->addDays(6)->endOfDay();
        $reservations = Reservation::where('reservation_date', '>', $firstDate)
            ->where('reservation_date', '<', $lastDate)
            ->where('status', 'Antrian')
            ->get();
        return view('index', [
            'reservations' => $reservations,
            'monthlyProducts' => Product::where('category', 'Monthly')->orderBy('price', 'asc')->get(),
            'dailyProducts' => Product::where('category', 'Daily')->orderBy('price', 'asc')->get(),
            'nextSevenDays' => $nextSevenDays,
            'timeList' => $timeList,
        ]);
    }
}
