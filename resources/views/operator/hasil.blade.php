<x-operator.apps>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex  align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title">Pengunggahan Hasil</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ asset('files/FORMAT UNGGAH PENGUMUMAN PPDB SMP Kab. CIANJUR.xlsx') }}">
                                <button type="button" class="btn btn-sm btn-success"><i class="mdi mdi-download-outline"></i> Unduh Format Unggah</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('operator.hasil.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <label for="unggah">Unggah</label>
                    <input type="file" class="form-control" name="file" id="unggah">
                    <button type="submit" class="btn btn-sm btn-info mt-2"><i class="mdi mdi-upload-outline"></i> Unggah</button>

                    </form>
                </div>
                <div class="card-header bg-soft-info">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
{{--                            <h5 class="card-title">Daftar Hasil Unggah</h5>--}}
                        </div>
                        <div class="flex-shrink-0">
                        <form action="{{ route('operator.hasil.reset') }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="mdi mdi-lock-reset"></i> Reset</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
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
