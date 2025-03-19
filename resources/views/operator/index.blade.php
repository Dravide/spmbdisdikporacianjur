<x-operator.apps>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Home</h4>
                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <!--<div class="row mb-3">-->
    <!--    <div class="col-12">-->
    <!--        <div class="card alert border mt-4 mt-lg-0 p-0 mb-0">-->
    <!--            <div class="card-header bg-soft-danger">-->
    <!--                <div class="d-flex">-->
    <!--                    <div class="flex-grow-1">-->
    <!--                        <h5 class="font-size-16 text-danger my-1">Informasi Maintenance</h5>-->
    <!--                    </div>-->
    <!--                    <div class="flex-shrink-0">-->
    <!--                        <button type="button" class="btn-close" data-bs-dismiss="alert"-->
    <!--                                aria-label="Close"></button>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="card-body">-->
    <!--                <div class="text-center">-->
    <!--                    <div class="mb-4">-->
    <!--                        <i class="mdi mdi-alert-outline display-4 text-danger"></i>-->
    <!--                    </div>-->
    <!--                    <h4 class="alert-heading">Sehubungan dengan adanya ketidaksesuaian data Cut Off Pusdatin-->
    <!--                        dengan-->
    <!--                        Data Verval PD yang sudah diupdate, maka Kami akan melakukan Maintenance untuk Update-->
    <!--                        Data-->
    <!--                        Cut Off beserta dengan Update Minor lainnya pada Pukul 15.00 WIB sampai dengan Selesai,-->
    <!--                        setelah itu akan kami sampaikan Change Log setelah Maintenance Selesai.</h4>-->
    <!--                    <p class="mb-0">Terima Kasih serta Mohon Maaf dan Mohon dimaklumi demi kelancaran PPDB-->
    <!--                        dihari-->
    <!--                        selanjutnya.</p>-->

    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-light" role="alert">
                        <h4 class="alert-heading">Selamat Datang {{ Auth::user()->sekolah->nama_sekolah }}</h4>
                        <hr>
                        <b class
                           ="text-danger"><i class="mdi mdi-information-outline text-danger"></i> Info / Change Log
                        </b>
                        <p class="mb-0"> Kami sedang melakukan
                            sedikit update menu Unduh Rekap Excel.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex text-muted">
                                <div class="flex-shrink-0  me-3 align-self-center">
                                    <div class="avatar-sm">
                                        <div class="avatar-title bg-soft-info rounded-circle text-info font-size-20">
                                            <i class="mdi mdi-account-details"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1 small">Jumlah Pendaftar</p>
                                    <h5 class="mb-1">{{ $jumlahpendaftar }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex text-muted">
                                <div class="flex-shrink-0  me-3 align-self-center">
                                    <div class="avatar-sm">
                                        <div
                                            class="avatar-title bg-soft-success rounded-circle text-success font-size-20">
                                            <i class="mdi mdi-account-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1 small">Terverifikasi</p>
                                    <h5 class="mb-1">{{ $terverifiaksi }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex text-muted">
                                <div class="flex-shrink-0  me-3 align-self-center">
                                    <div class="avatar-sm">
                                        <div
                                            class="avatar-title bg-soft-danger rounded-circle text-danger font-size-20">
                                            <i class="mdi mdi-account-minus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="mb-1 small">Belum Terverifikasi</p>
                                    <h5 class="mb-1">{{ $jumlahpendaftar - $terverifiaksi }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Progress</h4>
                            <div class="progress progress-lg ">
                                <div class="progress-bar bg-danger" role="progressbar"
                                     style="width: {{ round($terverifiaksi/$jumlahpendaftar*100, 2) }}%;"
                                     aria-valuenow="{{ round($terverifiaksi/$jumlahpendaftar*100, 2) }}"
                                     aria-valuemin="0"
                                     aria-valuemax="100">{{ round($terverifiaksi/$jumlahpendaftar*100, 2) }}%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card alert alert-success">
                        <div class="card-body">
                            <h4 class="card-title">Unduh Data Pendaftar</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="m-0">Data peserta didik yang diterima sudah dapat diunduh melalui tombol disamping. Silahkan unduh data melalui tombol unduh data!</p>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('operator.excel.exportdata')}}" class="me-2 mb-2 mb-sm-2 w-100 btn btn-danger">
                                    <img width="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACEUlEQVR4nO2Yv0scQRiGR4gEAyoENWKhWKULdinsUljcxcpGolgJhjTXBLt04Zr0Kez9AywEaxHkLmkSEFQMKCGo2IQg6HrqE5bb1S/r7N7cZX/CPN3tfDPzvvPtznxzSlksltgAngHrwAUPuQbqwITKK8AqrdlTeQU4xIwBlUeAX0LkiGlbbgAOhMinRTQwB+wCHzVt+TcQhTWQBkDVOwOqhXyFAMcT6BTVwB2aNmsgce7X32YgGwqXAaAL+AQcS/EGBlzOgM9Adzbqm6KW0OO0Ual+yEZ9U9SKRlAj5CCrhFx01rJR3xQ1HxCzbNBnAbgRfd6no1Yv5pF3hfS5Bd5FxM94V0ufbaAnXdUPRT0GNgImFjVxU8CliPsWvDNkBvAE2BTi3FWeFe2TwLlo3wOGVZ4A+oGvQuQVMA28BP6I50fAqMojwCCwI8S6u85v8fsnMK7yDDASuBv7nADP0xQyDXwRNb6P4z0vRfQdA36IPqfAiyTm0gKUMaMcMUavuxsBb6P+ByKGuXSDyo8xiprxoGnOxb+p7NPsNj6XMRhwYp9L2m7Vbsh3YEicGVu6INWBlk4NBD82E954fV+ZVrBJGqh6VWdcGWjoKtjEDKQJ1kBBM+CIfv2JKozgf7ZR9/jW4RZnFREXuiUmQK0dA68jBtoXcWFbYhKUjA2IGqUeeJ3SzoDjrnzb4i0WiyoMfwHISu9rvhAMLAAAAABJRU5ErkJggg==">
                                    Unduh Data
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Rekapitulasi</h4>

                        <div class="pe-3" data-simplebar>
                            @foreach($jalurs as $jalur)
                                <a href="{{ route('operator.verval', $jalur->id) }}" class="text-body d-block">
                                    <div class="d-flex py-2">
                                        <div class="flex-shrink-0 me-3 align-self-center">
                                            <div class="avatar-xs">
                                            <span
                                                class="avatar-title bg-soft-light rounded-circle text-primary">
                                                                <img src="{{ $jalur->svg }}" height="28">
                                                            </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="font-size-14 mb-1">{{ $jalur->kode }}</h5>
                                            <p class="small mb-0">
                                                {{ $jalur->nama_jalur }}
                                            </p>
                                        </div>
                                        <div class="flex-shrink-0 font-size-13 align-middle">
                                                <span
                                                    class="badge badge-soft-info">{{ $jalur->jumlahv }} / {{ $jalur->jumlah }}  Pendaftar</span>

                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- end card-->
            </div>
        </div>


    </div>

    @push('js')



    @endpush
</x-operator.apps>
