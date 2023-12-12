<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'merk',
        'type',
        'plate_number',
        'reservation_date',
        'reservation_time',
        'product_id',
        'message',
        'price',
        'status',
    ];
    use HasFactory;
}
