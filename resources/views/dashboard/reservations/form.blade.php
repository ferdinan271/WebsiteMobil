@extends('dashboard.layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
        {{ isset($reservation) ? 'Edit' : 'Create' }}
    </h2>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    {{-- <form method="{{ isset($reservation) ? 'POST' : 'PUT' }}" --}}
                    <form method="POST"
                        action="{{ isset($reservation) ? route('reservations.update', $reservation->id) : route('reservations.store') }}"
                        class="mt-6 space-y-6" class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        {{-- @isset($reservation)
                            @method('PUT')
                        @endisset --}}
                        @if (isset($reservation))
                            @method('PUT')
                        @endif
                        <div class="flex">
                            <div class="w-full md:w-1/2 mx-2">
                                <x-input-label for="name" value="Nama" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="$reservation->name ?? old('name')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="w-full md:w-1/2 mx-2">
                                <x-input-label for="phone" value="No Hp" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="$reservation->phone ?? old('phone')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-full md:w-1/3 mx-2">

                                <x-input-label for="merk" value="Merk" />
                                <x-text-input id="merk" name="merk" type="text" class="mt-1 block w-full"
                                    :value="$reservation->merk ?? old('merk')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('merk')" />
                            </div>
                            <div class="w-full md:w-1/3 mx-2">
                                <x-input-label for="type" value="Type" />
                                <x-text-input id="type" name="type" type="text" class="mt-1 block w-full"
                                    :value="$reservation->type ?? old('type')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('type')" />
                            </div>
                            <div class="w-full md:w-1/3 mx-2">

                                <x-input-label for="plate_number" value="No. Polisi" />
                                <x-text-input id="plate_number" name="plate_number" type="text" class="mt-1 block w-full"
                                    :value="$reservation->plate_number ?? old('plate_number')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('plate_number')" />
                            </div>
                        </div>
                        <div class="flex">
                            <div class='w-full md:w-1/2 mx-2'>
                                <x-input-label for="reservation_date" value="Tanggal Reservasi" />
                                <x-text-input id="reservation_date" name="reservation_date" type="date"
                                    class="mt-1 block w-full" :value="$reservation->reservation_date ?? old('reservation_date')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('reservation_date')" />
                            </div>
                            <div class='w-full md:w-1/2 mx-2'>
                                <x-input-label for="reservation_time" value="Jam Kedatangan" />
                                <x-select-input name="reservation_time" class="mt-1 block w-full">
                                    <option value=""></option>
                                    @foreach ($times as $time)
                                        <option value="{{ $time }}"
                                            {{ ($reservation->reservation_time ?? old('reservation_time')) == $time ? 'selected' : '' }}>
                                            {{ $time }} </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('reservation_time')" />
                            </div>
                        </div>
                        <div class='mx-2'>
                            <x-input-label for="message" value="Pesan (Opsional)" />
                            <x-textarea-input id="message" name="message" class="mt-1 block w-full"
                                autofocus>{{ $product->message ?? old('message') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('message')" />
                        </div>
                        <div class="flex">
                            <div class='w-full md:w-1/2 mx-2'>
                                <x-input-label for="product_id" value="Jam Kedatangan" />
                                <x-select-input name="product_id" id="product_id" class="mt-1 block w-full">
                                    <option value=""></option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price={{ $product->price }}
                                            {{ ($reservation->product_id ?? old('product_id')) == $product->id ? 'selected' : '' }}>
                                            {{ $product->title }} </option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('product_id')" />
                            </div>
                            <div class='w-full md:w-1/2 mx-2'>
                                <x-input-label for="price" value="Harga" />
                                <x-text-input id="price" name="price" type="number" step="0.01" min=0
                                    class="mt-1 block w-full" :value="$reservation->price ?? old('price')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#product_id').change(function() {
                                    var selectedPrice = $(this).find(':selected').data('price');
                                    $('#price').val(selectedPrice);
                                });
                            });
                        </script>
                        <div class='w-full  mx-2'>
                            <x-input-label for="status" value="Status" />
                            <x-select-input name="status" class="mt-1 block w-full">
                                <option value=""></option>
                                @php
                                    $statuses = ['Menunggu Konfirmasi', 'Antrian', 'Selesai', 'Batal'];
                                @endphp
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}"
                                        {{ ($reservation->status ?? old('status')) == $status ? 'selected' : '' }}>
                                        {{ $status }} </option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for image input
        document.getElementById('image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in image_preview
                document.getElementById('image_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
