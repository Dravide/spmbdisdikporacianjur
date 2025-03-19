<x-apps>
    <x-title-nara>
        <x-slot name="title">Jalur</x-slot>
    </x-title-nara>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group me-2 mb-2">
                        <a href="{{ route('jalur.create') }}"
                           class="btn btn-soft-info btn-sm waves-light waves-effect">
                            <i class="mdi mdi-book-plus"></i> Tambah Jalur
                        </a>
                    </div>
                </div>

                <div class="btn-toolbar justify-content-md-end" role="toolbar">
                    <div class="btn-group ms-2 mb-2">
                        <button type="button" class="btn btn-soft-pink btn-sm waves-light waves-effect dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya <i class="mdi mdi-dots-vertical ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Jalur</h4>
                    <p class="card-title-desc">Daftar Jalur Pendaftaran Penerimaan Peserta Didik Baru Dinas Pendidikan
                        Pemuda dan Olahraga Kab. Cianjur Tahun 2023.</p>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 no">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Jalur</th>
                                <th>Daftar Berkas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jalur as $data)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $loop->iteration }}</th>
                                    <td class="align-middle">
                                        <div class="d-flex py-1">
                                            <div class="flex-shrink-0 me-3 align-self-center">
                                                <img class="rounded-circle avatar-xs" alt=""
                                                     src="{{ $data->svg }}">
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 mb-1">#{{ $data->kode }}</h5>
                                                <p class="text-truncate mb-0">
                                                    {{ $data->nama_jalur }}
                                                </p>
                                            </div>
                                        </div>

                                    </td>
                                    <td class="align-middle">
                                        @foreach($data->namaberkas as $nama_berkas)
                                            <span
                                                class="badge badge-soft-secondary text-wrap" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title=""
                                                data-bs-original-title="{{ $nama_berkas->nama_berkas }}">{{ $nama_berkas->kode }}</span>
                                        @endforeach</td>
                                    <td class="align-middle">
                                        <button type="button" data-id="{{ $data->id }}"
                                                class="btn btn-soft-success btn-sm waves-light waves-effect"
                                                data-bs-toggle="modal" data-bs-target=".edit">
                                            <i class="mdi mdi-clock"></i>
                                        </button>
                                        <a href="{{ route('jalur.edit', $data->id) }}"
                                           class="btn btn-soft-warning btn-sm waves-light waves-effect">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('jalur.destroy', $data->id) }}" method="POST"
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-soft-danger btn-sm waves-light waves-effect show_confirm">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade edit" tabindex="-1" aria-labelledby="mySmallModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jadwal Jalur PPDB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-10"><input type="text" name="kode" id="kode" placeholder="kode"
                                                  class="form-control"></div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin Menghapus data Jalur ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#557ef8',
                    cancelButtonColor: '#ef4d56',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak, Batal!'
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
    @endpush
</x-apps>
