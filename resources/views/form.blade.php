@extends('dashboard.layouts.app')
@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
        {{ isset($reservation) ? 'Edit' : 'Buat Reservasi' }}
    </h2>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">

                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="POST"
                        action="{{ isset($reservation) ? route('reservations.update', $reservation->id) : route('reservations.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($reservation)
                            @method('put')
                        @endisset
                        <div class="grid grid-flow-row-dense grid-cols-2 grid-rows-2 ...">
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="name" value="Nama" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="$user->name ?? old('name')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="email" value="Email" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="$user->email ?? old('email')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="phone" value="No. Hp" />
                                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                    :value="$user->phone ?? old('phone')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="address" value="Address" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                                    :value="$user->address ?? old('address')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="plate_number" value="Plat Nomor Kendaraan" />
                                <x-text-input id="plate_number" name="plate_number" type="text" class="mt-1 block w-full"
                                    :value="$reservation->plate_number ?? old('plate_number')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('plate_number')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="product_id" value="Paket Cuci" />
                                <x-select-input name="product_id" class="mt-1 block w-full">
                                    <option value=""></option>
                                    @foreach ($products as $product)
                                        <option value={{ $product->id }}>
                                            {{ $product->category . ' - ' . $product->title }}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('product_id')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="reservation_date" value="Tanggal Reservasi" />
                                <x-text-input id="reservation_date" name="reservation_date" type="date"
                                    class="mt-1 block w-full" :value="$reservation->reservation_date ?? old('reservation_date')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('reservation_date')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="reservation_time" value="Jam Kedatangan" />
                                <x-select-input name="reservation_time" class="mt-1 block w-full">
                                    <option value=""></option>
                                    @foreach ($times as $time)
                                        <option value="{{ $time }}">
                                            {{ $time }}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error class="mt-2" :messages="$errors->get('reservation_time')" />
                            </div>
                            <div class='m-4 sm:m-2 w-50'>
                                <x-input-label for="message" value="Pesan (Opsional)" />
                                <x-textarea-input id="message" name="message" class="mt-1 block w-full"
                                    autofocus>{{ $product->message ?? old('message') }}</x-textarea-input>
                                <x-input-error class="mt-2" :messages="$errors->get('message')" />
                            </div>

                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Submit') }}</x-primary-button>
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
