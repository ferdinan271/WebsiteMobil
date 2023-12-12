@php
    use App\Models\Product;
@endphp
@extends('dashboard.layouts.app')
@section('header')
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Dashboard' }}
        </h2>

    </div>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <table data-theme="light" id="reservationsTable" class="display min-w-full divide-y divide-gray-200"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Mobil</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                {{-- <th>Paket</th> --}}
                                {{-- <th>Harga</th> --}}
                                {{-- <th>Description</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $reservation->name }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $reservation->phone }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $reservation->merk }}
                                        {{ $reservation->type }} - {{ $reservation->plate_number }}</td>
                                    {{-- <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ Product::find($reservation->product_id)->title }}</td> --}}
                                    <td class="px-6 py-4 whitespace-no-wrap">{{ $reservation->reservation_date }} |
                                        {{ $reservation->reservation_time }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        @php
                                            $class = '';
                                            switch ($reservation->status) {
                                                case 'Menunggu Konfirmasi':
                                                    $class = 'bg-yellow-500';
                                                    break;
                                                case 'Antrian':
                                                    $class = 'bg-blue-500';
                                                    break;
                                                case 'Selesai':
                                                    $class = 'bg-green-500';
                                                    break;
                                                case 'Batal':
                                                    $class = 'bg-red-500';
                                                    break;
                                                default:
                                                    $class = '';
                                                    break;
                                            }
                                        @endphp
                                        <div
                                            class="{{ $class }} text-white rounded-full px-2 py-1 inline-flex items-center">
                                            {{ $reservation->status }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{-- <a href="{{ route('reservations.show', $reservation->id) }}"
                                        class="border border-blue-500 hover:bg-blue-500 text-blue-500 hover:text-white p-2 mx-1 rounded-md"><i
                                            class="fa-solid fa-eye"></i></a> --}}
                                        <a href="{{ route('reservations.edit', $reservation->id) }}"
                                            class="border border-yellow-500 hover:bg-yellow-500 text-yellow-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        {{-- add delete button using form tag --}}
                                        <form method="POST" action="{{ route('reservations.delete', $reservation->id) }}"
                                            id="delete-reservation{{ $reservation->id }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <a onclick="Swal.fire({
                                                  title: 'Confirm Delete',
                                                  text: 'Are you sure you want to delete reservation {{ $reservation->title }}?',
                                                  icon: 'warning',
                                                  showCancelButton: true,
                                                  confirmButtonText: 'Yes, delete it',
                                                  cancelButtonText: 'Cancel'
                                              }).then((result) => {
                                                  if (result.isConfirmed) {
                                                      document.getElementById('delete-reservation{{ $reservation->id }}').submit();
                                                  }
                                              });"
                                                class="border border-red-500 hover:bg-red-500 text-red-500 hover:text-white p-2 mx-1 rounded-md"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <script>
            // $("#reservationsTable").DataTable({
            //     // responsive: true,
            // });
            // new DataTable('#reservationsTable', {
            //     responsive: false,
            // });
            new DataTable('#reservationsTable', {
                responsive: false,
                darkMode: false,
            });
        </script>
    </div>
@endsection
