<x-apps>
    <x-title-nara>
        <x-slot name="title">Data Pendaftar</x-slot>
    </x-title-nara>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Daftar Pendaftar</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="hstack gap-2">
                                <form action="{{ route('cari') }}" method="get">
                                    @csrf
                                    <input class="form-control me-auto form-control-sm" type="text"
                                           placeholder="Masukan NISN / Username" name="kode" value="{{ old('kode') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="card-title-desc">Daftar Pendaftar Penerimaan Peserta Didik Baru Dinas
                        Pendidikan
                        Pemuda dan Olahraga Kab. Cianjur Tahun 2023.</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>NISN</th>
                                <th>Reset</th>
                                <th>Password</th>
                                <th>Jenis Pendaftaran</th>
                                <th>Jenis</th>
                            </thead>
                            <tbody>
                            @foreach($data as $user)
                                <tr>
                                    <th>{{ $loop->iteration  }}</th>
                                    <td><a href="{{ route('datapendaftar.show', $user->id) }}"><h5
                                                class="font-size-13">{{ $user->users->username }}</h5></a>
                                    </td>
                                    <td>{{ $user->nisn }}</td>
                                   
                                    <td><form action="{{ route('reset') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="nisn" value="{{ $user->nisn }}">
                                            <button type="button" class="btn btn-sm btn-danger konfirmasi mb-2"><i
                                                    class="mdi mdi-delete-empty me-1 "></i></button>
                                        </form></td>
                                    <td>

                                        <form action="{{ route('password') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="nisn" value="{{ $user->nisn }}">
                                            <button type="button" class="btn btn-sm btn-warning konfirmasi"><i
                                                    class="mdi mdi-form-textbox-password"></i></button>
                                        </form>
                                    </td>
                                    <td><span class="badge badge-soft-success">{{ Str::upper($user->jenis) }} KAB. CIANJUR</span> </td>
                                    <td>

                                        <form action="{{ route('jenispendaftaran') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="nisn" value="{{ $user->nisn }}">
                                            <button type="button" class="btn btn-sm btn-success konfirmasi"><i
                                                    class="mdi mdi-list-status"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $data->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
              type="text/css"/>
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
              rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
              rel="stylesheet"
              type="text/css"/>

    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Buttons examples -->
        {{--        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>--}}
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            $(document).on('click', '.konfirmasi', function (e) {
                var form = $(this).closest("form");
                e.preventDefault();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin Mereset Data ini!",
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
        @if(session('sukses'))
            <script type="text/javascript">
                Swal.fire({
                    icon: "success",
                    title: "{!! session('sukses') !!}",
                    showConfirmButton: !1,
                    timer: 1500
                })
            </script>
        @endif
        @if(session('error'))
            <script type="text/javascript">
                Swal.fire({
                    icon: "error",
                    title: "{!! session('error') !!}",
                    showConfirmButton: !1,
                    timer: 1500
                })
            </script>
        @endif
    @endpush
</x-apps>
