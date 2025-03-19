<x-apps>
    <x-title-nara>
        <x-slot name="title">Tambah Jalur</x-slot>
    </x-title-nara>
    <form action="{{ route('jalur.store') }}" method="POST">
        <div class="row">
            @csrf
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <label class="form-label mt-2" for="nama_jalur">Nama Jalur</label>
                        <input class="form-control  @error('nama_jalur') is-invalid @enderror"
                               type="text"
                               id="nama_jalur"
                               name="nama_jalur"
                               placeholder="Nama Jalur"
                               value="{{ old('nama_jalur') }}">
                        @error('nama_jalur')
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
                               value="{{ old('kode') }}">
                        @error('kode')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="form-label mt-2" for="svg">SVG</label>
                        <textarea class="form-control form-control-sm @error('svg') is-invalid @enderror"
                                  id="svg"
                                  name="svg"
                                  rows="5"
                                  placeholder="SVG">{{ old('svg') }}</textarea>
                        @error('svg')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label" for="berkas">Berkas</label>
                            <select class="form-control select2-multiple" multiple
                                    data-placeholder="Pilih Berkas" name="berkas[]" id="berkas">
                                @foreach($berkass as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_berkas }}</option>
                                @endforeach
                            </select>
                            <hr>
                            <button class="btn btn-primary" type="submit"><i
                                    class="mdi mdi-content-save-all-outline"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
    @push('css')
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    @push('js')
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.select2-multiple').select2();
            });
        </script>
    @endpush
</x-apps>
