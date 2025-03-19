<x-home.app>

    <!-- DITERIMA/TIDAK DITERIMA -->
    <section class="py-lg-1 py-1 mt-xl-1  mt-0 coworking-1">
        <div class="container mt-6 mt-sm-6 mt-md-6 mt-lg-0 mt-xl-0">
            <div class="row py-3">
                <div class="col-lg-8">
                    <div class="card py-3 px-3 justify-content-between" style="background-color: #f0f0f052; height:100%; margin: 0">


                    <div class="text-center">
                        <img src="{{asset('')}}/assets-fe/images/logo.png" height="65" class="align-top logo-dark" alt=""/>
                        <h3 class="m-0">Pengumuman Hasil Seleksi</h3>
                        <h4 class="m-0">Penerimaan Peserta Didik Baru (PPDB) DISDIKPORA Kab. Cianjur Tahun 2024</h4>

                    </div>

                        <table class="ml-25 ml-small-10" >
                            <tr>
                                <td>Username</td>
                                <td>: {{$username}}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{$collectData->dapodik->nama}}</td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: {{$collectData->dapodik->nisn}}</td>
                            </tr>
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>: {{$collectData->asal_sekolah->nama}}</td>
                            </tr>
                        </table>
                    <div class="text-center">
                        <p class="m-0">dinyatakan :</p>
                    </div>
                    <div class="text-center">
                         <button type="button" class="btn btn-primary waves-effect waves-light">DITERIMA</button>
                    </div>
                    <div class="text-center">
                        <p>Pada seleksi Penerimaan Peserta Didik Baru tingkat SMP Dinas Pendidikan Pemuda dan Olahraga Kabupaten Cianjur tahun 2024-2025 di :</p>
                    </div>
                    <table class="ml-25 ml-small-10" >
                        <tr>
                            <td>Sekolah Tujuan</td>
                            <td>: {{$collectData->sekolah->nama_sekolah}}</td>
                        </tr>
                        <tr>
                            <td>Jalur</td>
                            <td>: {{$collectData->jalur->nama_jalur}}</td>
                        </tr>

                    </table>
                    <p></p>
                    <div class="text-center">
                        <p>© Disdikpora Kabupaten Cianjur tahun 2024 | PPDB Kab. Cianjur</p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 " >
                    <div class="card py-3 px-3 justify-content-between" style="background-color: #f0f0f052; height:100%; margin: 0">

                        <div>
                            <img width="100%" class="align-top logo-dark" src="data:image/png;base64, {{base64_encode(\SimpleSoftwareIO\QrCode\Facades\QrCode::format('png')->size('400')->generate('https://ppdbsmpdisdikporacianjur.com/d/'. $crypt))}}">
                        </div>
                        <div>
                            <p class="my-3 mx-1">Unduh Berkas : </p>
                            <form method="POST" action="{{route('unduhKelulusan')}}">
                                @csrf
                                <input type="hidden" name="username" value="{{$username}}">
                                <button type="submit" class="me-2 mb-2 mb-sm-2 w-100 btn btn-info">
                                    <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACEUlEQVR4nO2Yv0scQRiGR4gEAyoENWKhWKULdinsUljcxcpGolgJhjTXBLt04Zr0Kez9AywEaxHkLmkSEFQMKCGo2IQg6HrqE5bb1S/r7N7cZX/CPN3tfDPzvvPtznxzSlksltgAngHrwAUPuQbqwITKK8AqrdlTeQU4xIwBlUeAX0LkiGlbbgAOhMinRTQwB+wCHzVt+TcQhTWQBkDVOwOqhXyFAMcT6BTVwB2aNmsgce7X32YgGwqXAaAL+AQcS/EGBlzOgM9Adzbqm6KW0OO0Ual+yEZ9U9SKRlAj5CCrhFx01rJR3xQ1HxCzbNBnAbgRfd6no1Yv5pF3hfS5Bd5FxM94V0ufbaAnXdUPRT0GNgImFjVxU8CliPsWvDNkBvAE2BTi3FWeFe2TwLlo3wOGVZ4A+oGvQuQVMA28BP6I50fAqMojwCCwI8S6u85v8fsnMK7yDDASuBv7nADP0xQyDXwRNb6P4z0vRfQdA36IPqfAiyTm0gKUMaMcMUavuxsBb6P+ByKGuXSDyo8xiprxoGnOxb+p7NPsNj6XMRhwYp9L2m7Vbsh3YEicGVu6INWBlk4NBD82E954fV+ZVrBJGqh6VWdcGWjoKtjEDKQJ1kBBM+CIfv2JKozgf7ZR9/jW4RZnFREXuiUmQK0dA68jBtoXcWFbYhKUjA2IGqUeeJ3SzoDjrnzb4i0WiyoMfwHISu9rvhAMLAAAAABJRU5ErkJggg==">
                                    BUKTI KELULUSAN
                                </button>
                                @if($berkasDaftarUlang != null)
                                    @foreach($berkasDaftarUlang as $bdu)
                                    <a href="{{$bdu->link}}" class="me-2 mb-2 mb-sm-2 w-100 btn btn-info"><img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACEUlEQVR4nO2Yv0scQRiGR4gEAyoENWKhWKULdinsUljcxcpGolgJhjTXBLt04Zr0Kez9AywEaxHkLmkSEFQMKCGo2IQg6HrqE5bb1S/r7N7cZX/CPN3tfDPzvvPtznxzSlksltgAngHrwAUPuQbqwITKK8AqrdlTeQU4xIwBlUeAX0LkiGlbbgAOhMinRTQwB+wCHzVt+TcQhTWQBkDVOwOqhXyFAMcT6BTVwB2aNmsgce7X32YgGwqXAaAL+AQcS/EGBlzOgM9Adzbqm6KW0OO0Ual+yEZ9U9SKRlAj5CCrhFx01rJR3xQ1HxCzbNBnAbgRfd6no1Yv5pF3hfS5Bd5FxM94V0ufbaAnXdUPRT0GNgImFjVxU8CliPsWvDNkBvAE2BTi3FWeFe2TwLlo3wOGVZ4A+oGvQuQVMA28BP6I50fAqMojwCCwI8S6u85v8fsnMK7yDDASuBv7nADP0xQyDXwRNb6P4z0vRfQdA36IPqfAiyTm0gKUMaMcMUavuxsBb6P+ByKGuXSDyo8xiprxoGnOxb+p7NPsNj6XMRhwYp9L2m7Vbsh3YEicGVu6INWBlk4NBD82E954fV+ZVrBJGqh6VWdcGWjoKtjEDKQJ1kBBM+CIfv2JKozgf7ZR9/jW4RZnFREXuiUmQK0dA68jBtoXcWFbYhKUjA2IGqUeeJ3SzoDjrnzb4i0WiyoMfwHISu9rvhAMLAAAAABJRU5ErkJggg==">
                                {{strtoupper($bdu->berkas)}}
                                </a>
                                    @endforeach
                                @endif

                            </form>

                            <a href="https://ppdbsmpdisdikporacianjur.com" class="me-2 mb-2 mb-sm-2 w-100 btn btn-danger">
                                <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABsUlEQVR4nO3ZPWsVURDG8fWljCIiYiEIMfZ+AbHNNY2lhdgYrDXYW1va6AfwrREtbLUSwZdCxMYEbJKUgaCVSdCfHF3ksJjNPebkmovz7/YyZ87MPk9xd6ZpgiAIcrAPJzHAVdzGMyxiHW8x0/xrcAT7s+eL+IA1W/MtNdiMsNiDuIJ7eIPVtpBPONTGfFHGy1EVfxwLPYWcbeMeZb8t4TnuYA7nMIWjQzS21r6kOgrh4SYXfW4V+Wkj7MUJTGyRb1i+V2kCK1nSa+mN49g28pXwukYDv9l2siHy4XAW8nXHL9yJfGreGQ10CAVKCQt1CAuVEhbqEBYq5b+1EGaw3P61HoxjA0vZ0cWSfKKBOgoMWhXSx/z02CmwGdFAKaFAh7BQKWGhDmGhUsJCu2CwtZIlnKs5Wmx+PU/1DI+rjBYf9Ax307LiPm7gAk5jT2ED13uGu9O1xusfDc/j7OxEu/hI3wanknJZ3EamwHxnvP6qSvFZIQcwi7tJ1mzB8SdWs3NPe+LeVyvwL5tKy4ozuIybeJK2LriUxbzoscf5ZreDSdzKlnzJHu/GovggCJqR8AMi30K/eM9rJgAAAABJRU5ErkJggg==">

                                Logout
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" style="border:0px">
                        Silahkan unduh semua berkas di menu unduh berkas diatas (jika ada). Semua informasi mengenai daftar ulang dan informasi lainnya dapat dilihat di Bukti Kelulusan.
                    </div>
                </div>
            </div>
        </div>

    </section>


</x-home.app>

