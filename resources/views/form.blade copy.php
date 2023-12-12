<x-app-layout>
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Silahkan Memasukan Data Form Pemesanan Berikut</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 d-flex justify-content-center mb-5">
                <div class="col-lg-8">
                    <form id="contactForm" method="POST" action="{{ route('reservation.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Name input-->
                        <div class="row mb-3 ">
                            <div class="col-sm-6 ">
                                <div class=" mb-3">
                                    <label for="name">Nama</label>
                                    <input class="form-control rounded" id="name" type="text"
                                        placeholder="Ex*Abdul comoy" data-sb-validations="required"
                                        value="{{ old('name', $user->name) }}" />
                                    <div class="invalid-feedback" data-sb-feedback="name:required">Anda Belum
                                        Menginputkan Nama Anda</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="email">Alamat Email</label>
                                    <input class="form-control rounded" id="email" type="email"
                                        placeholder="Ex*Abdul comoy" data-sb-validations="required"
                                        value="{{ old('email', $user->email) }}" />
                                    <div class="invalid-feedback" data-sb-feedback="email:required">Anda Belum
                                        Menginputkan Email Anda
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="phone">Nomer Handphone</label>
                                    <input class="form-control rounded" id="phone" type="text"
                                        placeholder="(123) 456-7890" data-sb-validations="required"
                                        value="{{ old('phone', $user->phone) }}" />
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">Anda Belum
                                        Menginputkan Nomor Hp anda</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="address">Alamat</label>
                                    <input class="form-control rounded" id="address" type="text"
                                        placeholder="Ex: Jl. Semarang No.5 Malang" data-sb-validations="required"
                                        value="{{ old('address', $user->address) }}" />
                                    <div class="invalid-feedback" data-sb-feedback="address:required">Anda Belum
                                        Menginputkan Alamat Anda</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="plate_number">Plat Kendaraan</label>
                                    <input class="form-control rounded" id="plate_number" type="text"
                                        placeholder="Ex: N 1231 DDD" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="plate_number:required">Anda Belum
                                        Menginputkan Plat Kendaraan anda</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="package_type">Silahkan Pilih Paket</label>
                                    <select class="form-control" id="package_type" name="package_type" required>
                                        <option value=""></option>
                                        @foreach ($products as $product)
                                            <option value={{ $product->id }}>
                                                {{ $product->category . ' - ' . $product->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="reservation_date">Tanggal Reservasi</label>
                                    <input class="form-control rounded" id="reservation_date" type="date"
                                        placeholder="Tanggal Hari ini" name="reservation_date"
                                        data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">Anda Belum
                                        Menginputkan Tanggal Pemesanan</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="reservation_time">Jam Kedatangan</label>
                                    <select class="form-control" id="reservation_time" name="reservation_time" required>
                                        <option value=""></option>
                                        @foreach ($times as $time)
                                            <option value="{{ $time }}">
                                                {{ $time }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control rounded" id="pesan" type="text" placeholder="Enter your pesan here..."
                                style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="pesan">Pesan</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Anda Belum Menginputkan
                                Pesan</div>
                        </div>

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-warning btn-xl " id="submitButton"
                                type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    <div>+1 (555) 123-4567</div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
