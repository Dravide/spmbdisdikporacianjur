<x-apps>
    <x-title-nara>
        <x-slot name="title">{{ $edit ? 'Edit Berkas '.$edit->nama_berkas : 'Berkas' }}</x-slot>
    </x-title-nara>

    <div class="row">

        <div class="col-md-4">
            @if($edit)
                <form action="{{ route('berkas.update', $edit->id) }}" method="POST">
                    @method('PUT')
                    @else
                        <form action="{{ route('berkas.store') }}" method="POST">
                            @endif
                            @csrf
                            <div class="card {{ $edit ? 'bg-soft-pink' : '' }}">
                                <div class="card-body">
                                    <label class="form-label mt-2" for="nama_berkas">Nama Berkas</label>
                                    <input class="form-control  @error('nama_berkas') is-invalid @enderror"
                                           type="text"
                                           id="nama_berkas"
                                           name="nama_berkas"
                                           placeholder="Nama Berkas"
                                           value="{{ $edit ? $edit->nama_berkas :  old('nama_berkas') }}">
                                    @error('nama_berkas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <label class="form-label mt-2" for="kode">Kode</label>
                                    <input class="form-control form-control-sm @error('kode') is-invalid @enderror"
                                           type="text"
                                           id="kode"
                                           name="kode"
                                           placeholder="Kode"
                                           value="{{ $edit ? $edit->kode :  old('kode') }}">
                                    @error('kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <label class="form-label mt-2" for="svg">SVG</label>
                                    <textarea class="form-control form-control-sm @error('svg') is-invalid @enderror"
                                              id="svg"
                                              name="svg"
                                              rows="3"
                                              placeholder="SVG">{{ $edit ? $edit->svg :  old('svg') }}</textarea>
                                    @error('svg')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <label class="form-label mt-2" for="jenis_berkas">Jenis Berkas</label>
                                    <select
                                        class="form-control @error('jenis_berkas') is-invalid @enderror"
                                        id="jenis_berkas"
                                        name="jenis_berkas">
                                        <option value="" selected disabled>Pilih Jenis Berkas</option>
                                        <option value="1" @if($edit)
                                            {{ $edit->jenis_berkas == 1 ? 'selected' : '' }}
                                            @endif>Berkas Umum
                                        </option>
                                        <option value="2" @if($edit)
                                            {{ $edit->jenis_berkas == 2 ? 'selected' : '' }}
                                            @endif>Berkas Khusus
                                        </option>
                                        <option value="3" @if($edit)
                                            {{ $edit->jenis_berkas == 3 ? 'selected' : '' }}
                                            @endif>Berkas Tambahan
                                        </option>
                                    </select>
                                    @error('jenis_berkas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <hr>
                                    <button class="btn btn-primary btn-sm" type="submit"><i
                                            class="mdi mdi-content-save-all-outline"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Berkas</h4>
                    <p class="card-title-desc">Daftar Berkas Pendaftaran Penerimaan Peserta Didik Baru Dinas
                        Pendidikan
                        Pemuda dan Olahraga Kab. Cianjur Tahun 2023.</p>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 no">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Berkas</th>
                                <th>Jenis Berkas</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($berkas as $key => $data)
                                <tr>
                                    <th scope="row" class="align-middle">{{ $berkas->firstItem() + $key }}</th>
                                    <td class="align-middle">
                                        <div class="d-flex py-1">
                                            <div class="flex-shrink-0 me-3 align-self-center">
                                                <img class="rounded-circle avatar-xs" alt=""
                                                     src="{{ $data->svg }}">
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="font-size-14 mb-1">#{{ $data->kode }}</h5>
                                                <p class="text-truncate small mb-0">
                                                    {{ $data->nama_berkas }}
                                                </p>
                                            </div>
                                        </div>

                                    </td>
                                    <td class="align-middle">
                                        <p class="text-truncate mb-0">{{ $data->jenis_berkas == 1 ? 'Berkas Umum' : 'Berkas Khusus' }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" data-id="{{ $data->id }}"
                                                class="btn btn-soft-success btn-sm waves-light waves-effect"
                                                data-bs-toggle="modal" data-bs-target=".edit">
                                            <i class="mdi mdi-clock"></i>
                                        </button>
                                        <a href="{{ route('berkas.edit', $data->id) }}"
                                           class="btn btn-soft-warning btn-sm waves-light waves-effect">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <form action="{{ route('berkas.destroy', $data->id) }}" method="POST"
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
                    <div class="row mt-2">
                        <div class="col-7">
                            <div class="align-middle">
                                Menampilkan {{ $berkas->firstItem() }} - {{ $berkas->lastItem() }}
                                dari {{ $berkas->total() }} data
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="btn-group float-end">
                                {{ $berkas->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
              type="text/css">
        <link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet"
              type="text/css">
    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <script type="text/javascript">
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin Menghapus data Berkas ini!",
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
