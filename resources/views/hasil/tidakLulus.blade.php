<x-home.app>

    <!-- DITERIMA/TIDAK DITERIMA -->
    <section class="py-lg-1 py-1 mt-xl-1  mt-0 coworking-1">
        <div class="container mt-6 mt-sm-6 mt-md-6 mt-lg-0 mt-xl-0">
            <div class="row py-3">
                <div class="col-lg-12">
                    <div class="card py-3 px-3 justify-content-between" style="background-color: #f0f0f052; height:100%; margin: 0">


                    <div class="text-center">
                        <img src="{{asset('')}}/assets-fe/images/logo.png" height="65" class="align-top logo-dark" alt=""/>
                        <h3 class="m-0">Pengumuman Hasil Seleksi</h3>
                        <h4 class="m-0">Penerimaan Peserta Didik Baru (PPDB) DISDIKPORA Kab. Cianjur Tahun 2024</h4>

                    </div>

                        <table class="" style="margin-left: 25%">
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
                        <button type="button" class="btn btn-danger waves-effect waves-light">TIDAK DITERIMA</button>
                        <p>Pada seleksi Penerimaan Peserta Didik Baru tingkat SMP Dinas Pendidikan Pemuda dan Olahraga Kabupaten Cianjur tahun 2024-2025 di :</p>
                    </div>
                    <table class="" style="margin-left: 25%">
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
                    @if($username == "PPDB3LJZ7XO")
                    <div class="text-center alert alert-danger" style="border: 0px">
                        <p class="p-0 m-0">Catatan : Kartu Keluarga Bermalasah</p>
                    </div>
                    @elseif($username == "PPDBY6FJZND")
                    <div class="text-center alert alert-danger" style="border: 0px">
                        <p class="p-0 m-0">Catatan : Kartu Keluarga Bermalasah</p>
                    </div>
                    @else
                    
                    @endif
                    <div class="text-center">
                        <p>© Disdikpora Kabupaten Cianjur tahun 2024 | PPDB Kab. Cianjur</p>
                    </div>
                    
                    
                        <a href="https://ppdbsmpdisdikporacianjur.com" class="me-2 mb-2 mb-sm-2 w-100 btn btn-info">
                            <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABsUlEQVR4nO3ZPWsVURDG8fWljCIiYiEIMfZ+AbHNNY2lhdgYrDXYW1va6AfwrREtbLUSwZdCxMYEbJKUgaCVSdCfHF3ksJjNPebkmovz7/YyZ87MPk9xd6ZpgiAIcrAPJzHAVdzGMyxiHW8x0/xrcAT7s+eL+IA1W/MtNdiMsNiDuIJ7eIPVtpBPONTGfFHGy1EVfxwLPYWcbeMeZb8t4TnuYA7nMIWjQzS21r6kOgrh4SYXfW4V+Wkj7MUJTGyRb1i+V2kCK1nSa+mN49g28pXwukYDv9l2siHy4XAW8nXHL9yJfGreGQ10CAVKCQt1CAuVEhbqEBYq5b+1EGaw3P61HoxjA0vZ0cWSfKKBOgoMWhXSx/z02CmwGdFAKaFAh7BQKWGhDmGhUsJCu2CwtZIlnKs5Wmx+PU/1DI+rjBYf9Ax307LiPm7gAk5jT2ED13uGu9O1xusfDc/j7OxEu/hI3wanknJZ3EamwHxnvP6qSvFZIQcwi7tJ1mzB8SdWs3NPe+LeVyvwL5tKy4ozuIybeJK2LriUxbzoscf5ZreDSdzKlnzJHu/GovggCJqR8AMi30K/eM9rJgAAAABJRU5ErkJggg==">
                            Kembali/Logout
                        </a>
                    </div>

                </div>


            </div>
        </div>

    </section>


</x-home.app>
