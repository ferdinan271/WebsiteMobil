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
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="row mb-3 ">
                            <div class="col-sm-6 ">
                                    <div class=" mb-3">
                                        <label for="name">Nama Panjang</label>
                                        <input class="form-control rounded" id="name" type="text" placeholder="Ex*Abdul comoy" data-sb-validations="required" />
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Anda Belum Menginputkan Nama Anda</div>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                    <div class=" mb-3">
                                        <label for="email">Alamat Email</label>
                                        <input class="form-control rounded" id="email" type="email" placeholder="Ex*Abdul comoy" data-sb-validations="required" />
                                        <div class="invalid-feedback" data-sb-feedback="email:required">Anda Belum Menginputkan Email Anda</div>
                                    </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="phone">Nomer Handphone</label>
                                    <input class="form-control rounded" id="phone" type="number" placeholder="(123) 456-7890" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">Anda Belum Menginputkan Nomor Hp anda</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class=" mb-3">
                                    <label for="phone">Plat Kendaraan</label>
                                    <input class="form-control rounded" id="phone" type="text" placeholder="N 1231 DDD" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">Anda Belum Menginputkan Plat Kendaraan anda</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div class="col-sm">
                                <div class="form-groub mb-3">Silahkan Pilih Paket
                                    <label for="paket-option"></label>
                                    <select class="form-control" id="paket-option" name="paket_id" required >
                                        <option value=""></option>
                                        <option value="Bronze">Bronze</option>
                                        <option value="sliver">Sliver</option>
                                        <option value="gold">Gold</option>
                                        <option value="platinum">Platinum</option>
                                        <option value="ultimate">Ultimate</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col">
                                <div class=" mb-4">
                                    <label for="tanggal">Plat Kendaraan</label>
                                    <input class="form-control rounded" id="tanggal" type="date" placeholder="Tanggal Hari ini" data-sb-validations="required" />
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">Anda Belum Menginputkan Tanggal Pemesanan</div>
                                </div>
                            </div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control rounded" id="pesan" type="text" placeholder="Enter your pesan here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="pesan">Pesan</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Anda Belum Menginputkan Pesan</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Terima kasih , Pesan Anda Telah Dikirm :)</div>
                                </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-warning btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
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