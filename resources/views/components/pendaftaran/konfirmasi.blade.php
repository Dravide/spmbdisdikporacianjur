@if(Auth::user()->dataPendaftar->verval == 0 or Auth::user()->dataPendaftar->verval == 2)

    @if(Auth::user()->dataPendaftar->konfir == 0 or Auth::user()->dataPendaftar->konfir == 2)
        @if($jumlah == 0 AND $jumlahberkas == 0)
            <button type="button" class="btn btn-info dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" disabled>
                <i class="mdi mdi-console-network me-1"></i> Konfirmasi Pendaftaran
            </button>
        @else
            @if($jumlahberkas == $jumlah)
                <form action="{{ route('pendaftaran.konfirmasi') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ Auth::user()->dataPendaftar->id }}">
                    <input type="hidden" name="konfir" value="1">
                    <button type="button" class="btn btn-info dropdown-toggle konfirmasi"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-console-network me-1"></i> Konfirmasi Pendaftaran
                    </button>
                </form>
            @else
                <button type="button" class="btn btn-info dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" disabled>
                    <i class="mdi mdi-console-network me-1"></i> Konfirmasi Pendaftaran
                </button>
            @endif
        @endif
    @else
        <form action="{{ route('pendaftaran.konfirmasi') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ Auth::user()->dataPendaftar->id }}">
            <input type="hidden" name="konfir" value="2">
            <button type="button" class="btn btn-danger dropdown-toggle konfirmasi"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-account-cancel me-1"></i> Perbaiki Data Pendaftaran
            </button>
        </form>
    @endif
@else
    <button type="button" class="btn btn-warning dropdown-toggle"
            data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-search-web me-1"></i> Pengumuman
    </button>
@endif


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
