<x-Pendaftaran.apps title="Beranda">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-1">
                        <div class="flex-shrink-0 me-3">
                            <div class="avatar-sm">
                                <img class="avatar-title rounded-circle"
                                     src="https://placehold.co/200x200/png?text=PROFILE" alt="">
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-16">{{ Auth::user()->dataPendaftar->dapodik->nama ?? Auth::user()->username }}</h5>
                            @if(Auth::user()->dataPendaftar != null)
                                @if(Auth::user()->dataPendaftar['konfir'] == 1)
                                    <span
                                        class="badge badge-soft-success">Data dan Berkas Telah di Kirim ke Verifikator</span>
                                @else
                                    <span
                                        class="badge badge-soft-danger">Data dan Berkas Belum di Kirim ke Verifikator</span>
                                @endif
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="mt-2">
                        @isset(Auth::user()->dataPendaftar)
                            @if(Auth::user()->dataPendaftar['konfir'] == 1)
                                <x-Pendaftaran.verifikasi/>
                            @else
                                <h5 class="text-center">Anda Belum Melakukan Konfirmasi Pendaftaran</h5>
                            @endif
                        @endisset
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h4><i class="mdi mdi-content-save-alert-outline text-danger "></i> Notifikasi
                    </h4>
                    @if(Auth::user()->dataPendaftar != null)
                        @if(\Illuminate\Support\Facades\Auth::user()->dataPendaftar->verval == '1' )
                            <x-Pendaftaran.buktiPendaftaran/>
                        @else
                        @endif

                        <div class="alert alert-info mt-3" role="alert">
                            <h4 class="alert-heading">Selamat Datang!</h4>
                            <p class="my-1">Penerimaan Peserta Didik Baru Tingkat SMP Dinas Pendidikan Pemuda dan Olahraga Kabupaten Cianjur Tahun 2024.</p>
                        </div>
                            <div class="alert alert-danger mt-3" role="alert">
                                <h4 class="alert-heading">Peringatan!</h4>
                                <p class="my-1">Bagi pendaftar <strong>dalam kabupaten,</strong>  harap sinkronkan data sebelum melakukan <strong> konfirmasi pendaftaran</strong> apabila data belum sesuai.  </p>
                            </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            $('.konfirmasi').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin Konfirmasi Pendaftaran ini!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#557ef8',
                    cancelButtonColor: '#ef4d56',
                    confirmButtonText: 'Ya!',
                    cancelButtonText: 'Tidak!'
                })
                    .then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush

</x-Pendaftaran.apps>
