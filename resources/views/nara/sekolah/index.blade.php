<x-apps>
    <x-title-nara>
        <x-slot name="title">
            {{ __('Sekolah') }}
        </x-slot>
    </x-title-nara>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group me-2 mb-2">
                        <a href="{{ route('sekolah.create') }}"
                           class="btn btn-soft-info btn-sm waves-light waves-effect">
                            <i class="mdi mdi-book-plus"></i> Tambah Sekolah
                        </a>
                    </div>
                </div>

                <div class="btn-toolbar justify-content-md-end" role="toolbar">
                    <div class="btn-group ms-2 mb-2">
                        <button type="button"
                                class="btn btn-soft-pink btn-sm waves-light waves-effect dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya <i class="mdi mdi-dots-vertical ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Online</a>
                            <a class="dropdown-item" href="#">Offline</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Sekolah</h4>
                    <p class="card-title-desc">Daftar Sekolah Pendaftaran Penerimaan Peserta Didik Baru Dinas Pendidikan
                        Pemuda dan Olahraga Kab. Cianjur Tahun 2023.</p>
                    <div class="table-responsive">
                        <table class="table table-hover mb-2 no">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat</th>
                                <th>Status Online</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sekolahs as $k => $s)
                                <tr>
                                    <td class="align-middle">{{ $sekolahs->firstItem() + $k }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex">

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14">{{ $s->nama_sekolah }}</h5>
                                                <p class="text-truncate mb-0">
                                                    #{{ $s->npsn }}
                                                </p>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="align-middle"><p class="text-truncate">{{ $s->alamat_jalan }}</p></td>
                                    <td class="align-middle"><span
                                            class="badge badge-soft-{{ $s->status_online == 'online' ? 'success' : 'danger' }}">{{ $s->status_online }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('sekolah.edit', $s->id) }}"
                                           class="btn btn-soft-warning btn-sm waves-light waves-effect">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('sekolah.destroy', $s->id) }}" method="POST"
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
                        {{ $sekolahs->links() }}
                    </div>

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
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin Menghapus data Sekolah ini!",
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
