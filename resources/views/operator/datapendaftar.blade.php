<x-operator.apps>
    <div class="card">
        <div class="card-header">Data Pendaftar PPDB SMP DISDIKPORA Cianjur Tahun 2024
            Ke {{ Auth::user()->sekolah->nama_sekolah }}</div>
        <div class="card-body">
            {{ $dataTable->table() }}
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
        {{ $dataTable->scripts() }}
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
</x-operator.apps>
