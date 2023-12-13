<x-app-layout>
    <section class="page-section">
        <div class="container">
            <div class="container px-3 pb-3  pb-md-4">
                <h1>Pesan Layanan Washwizz</h1>
                <a href="{{ route('index') }}" style="text-decoration: none">⟵ Kembali ke halaman utama</a>
            </div>
            <div class="row ">
                <div class="col-lg-8 p-3 p-lg-4">
                    <form action="{{ route('reservations.store') }}" method="post">
                        @csrf
                        <h3>Pilih Layanan Sekali Cuci</h3>
                        @error('product_id')
                            <div class="text-danger" style="font-size: 14px">{{ $errors->get('product_id') }}</div>
                        @enderror
                        <div class="container">
                            <div class="row my-3 my-lg-4 d-flex justify-content-center">
                                @foreach ($dailyProducts as $product)
                                    <div class="col-md-4">
                                        <label for="basic{{ $product->id }}" class="card pricing-card mb-3 mb-sm-4">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->title }} </h5>
                                                <ul class="card-text mb-2">
                                                    @php
                                                        $features = explode(', ', $product->description);
                                                    @endphp
                                                    @foreach ($features as $feature)
                                                        <li>{{ $feature }}</li>
                                                    @endforeach
                                                </ul>
                                                <p class="subtitle">Harga</p>
                                                <p class="harga">Rp{{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <input required type="radio" class="text-center" name="product_id"
                                                    value="{{ $product->id }}" id="basic{{ $product->id }}"
                                                    {{ old('product_id') == $product->id || $product->id == $selectedProduct ? 'checked' : '' }}>
                                            </div>

                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="my-3">Isi Data Pribadi</h3>
                            <div class="row mb-3 ">
                                <div class="col-sm-6 mb-2">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input required type="text" class="form-control" id="name"
                                            name="name" placeholder="Isi Nama Lengkap" value={{ old('name') }}>
                                        @error('name')
                                            <div class="text-danger" style="font-size: 14px">{{ $errors->get('name') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="form-group">
                                        <label for="phone">No. Handphone</label>
                                        <input required type="phone" class="form-control" id="phone"
                                            name="phone" placeholder="08XXXXXXXXXX" value={{ old('phone') }}>
                                        @error('phone')
                                            <div class="text-danger" style="font-size: 14px">
                                                {{ implode(', ', $errors->get('phone')) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="my-3">Isi Data Kendaraan</h3>
                            <div class="row mb-3 ">
                                <div class="col-sm-6 mb-2 col-md-4">
                                    <div class="form-group">
                                        <label for="merk">Merk</label>
                                        <input required type="text" class="form-control" id="merk"
                                            name="merk" placeholder="Mazda" value={{ old('merk') }}>
                                        @error('merk')
                                            <div class="text-danger" style="font-size: 14px">{{ $errors->get('merk') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2 col-md-4">
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <input required type="text" class="form-control" id="type"
                                            name="type" placeholder="CX-5" value={{ old('type') }}>
                                        @error('type')
                                            <div class="text-danger" style="font-size: 14px">{{ $errors->get('type') }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2 col-md-4">
                                    <div class="form-group">
                                        <label for="plate_number">No. Polisi</label>
                                        <input required type="text" class="form-control" id="plate_number"
                                            name="plate_number" placeholder="N 2354 DM"
                                            value={{ old('plate_number') }}>
                                        @error('plate_number')
                                            <div class="text-danger" style="font-size: 14px">
                                                {{ $errors->get('plate_number') }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h3 class="my-3">Atur Jadwal</h3>
                            <div class="row mb-3 ">
                                <div class="col-sm-6 mb-2">
                                    <div class="form-group">
                                        <label for="reservation_date">Tanggal</label>
                                        <input required type="date" class="form-control" id="reservation_date"
                                            name="reservation_date" placeholder="" value={{ old('reservation_date') }}>
                                        @error('reservation_date')
                                            <div class="text-danger" style="font-size: 14px">
                                                {{ $errors->get('reservation_date') }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="form-group">
                                        <label for="reservation_time">Waktu</label>
                                        <select name="reservation_time" id="reservation_time" class="form-control">
                                            <option value=""></option>
                                            @foreach ($times as $time)
                                                <option value="{{ $time }}"
                                                    {{ old('reservation_time') == $time ? 'selected' : '' }}>
                                                    {{ $time }}</option>
                                            @endforeach
                                        </select>
                                        @error('reservation_time')
                                            <div class="text-danger" style="font-size: 14px">
                                                {{ implode(', ', $errors->get('reservation_time')) }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <div class="form-group">
                                    <label for="message">Pesan/Request (Opsional)</label>
                                    <input type="text" class="form-control" id="message" name="message"
                                        placeholder="" value="{{ old('message') }}">
                                    @error('message')
                                        <div class="text-danger" style="font-size: 14px">{{ $errors->get('message') }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group">
                                    <button class="btn btn-warning" type="submit">Pesan Sekarang!</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-4">
                    <div class="container border rounded">
                        <h2 class="ms-3 pt-5 fw-bold">FAQ </h2>
                        <h4 class="border-bottom border-5 border-warning pt-1"></h4>
                        <p class="d-inline-flex ">
                            <a class="btn " data-bs-toggle="collapse" href="#collapse1" role="button"
                                aria-expanded="false" aria-controls="collapseExample"> <span>+</span>Keuntungannya
                                dari
                                sistem peket apa ?</a>
                        </p>
                        <div class="collapse" id="collapse1">
                            <div class="card card-body bg-body-tertiary">Tugas aan mencari jawaban</div>
                        </div>

                        <div class="col">
                            <p class="d-inline-flex gap-1">
                                <a class="btn" data-bs-toggle="collapse" href="#collapse2" role="button"
                                    aria-expanded="false" aria-controls="collapseExample"> <span>+</span>Apakah Bisa
                                    Cuci
                                    mobil di rumah langsung ?</a>
                            </p>
                            <div class="collapse" id="collapse2">
                                <div class="card card-body bg-body-tertiary">Tanya aan</div>
                            </div>
                        </div>

                        <div class="col">
                            <p class="d-inline-flex gap-1">
                                <a class="btn" data-bs-toggle="collapse" href="#collapse3" role="button"
                                    aria-expanded="false" aria-controls="collapseExample"> <span>+</span>Metode
                                    Pembayarannya bisa pakek apa aja ?</a>
                            </p>
                            <div class="collapse" id="collapse3">
                                <div class="card card-body bg-body-tertiary">Anjay belum ada</div>
                            </div>
                        </div>

                        <div class="col">
                            <p class="d-inline-flex gap-1">
                                <a class="btn" data-bs-toggle="collapse" href="#collapse4" role="button"
                                    aria-expanded="false" aria-controls="collapseExample"> <span>+</span> Qoute Of The
                                    Day
                                    Dong Bangg! </a>
                            </p>
                            <div class="collapse" id="collapse4">
                                <div class="card card-body bg-body-tertiary">Ayam Berkokok Diatas Genteng Ga Ngerokok
                                    Ga
                                    Ganteng !!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
