<x-Pendaftaran.apps title="Jalur Pendaftaran">
    @if((Auth::user()->dataPendaftar->konfir == 2 or Auth::user()->dataPendaftar->konfir == 0))
        @if(Auth::user()->dataPendaftar->koordinat->latitude == null)
            <div class="alert alert-danger">
                <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i>Silahkan Isi <strong>Formulir</strong>
                    terlebih dahulu.</p>
            </div>
        @else
    <form action="{{ route('pendaftaran.jalur.store') }}" method="post">
        @csrf
    <div class="card mb-0">
        <h4 class="card-header bg-dark text-white">Jalur Pendaftaran</h4>
        <div class="card-body">
            {{--Jalur Pendaftaran--}}
            @if($jalur)
                <div class="alert alert-danger mb-1" role="alert">
                    Dengan mengubah <strong>Jalur Pendaftaran</strong> secara otomatis menghapus semua <strong>Berkas
                        Khusus</strong>!
                </div>
            @endif
            <label for="jalur"></label><select class="form-control jalur" id="jalur" name="jalur" required>
                <option></option>
                @foreach ($jalur as $data)
                    <option
                        value="{{ $data->id }}" @selected($data->id == $datas->id_jalur)>{{ $data->nama_jalur }}</option>
                @endforeach
            </select>
            @error('jalur')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="card-footer bg-white">
            <button type="submit" class="btn btn-soft-dark my-2"><i class="mdi mdi-content-save-cog-outline"></i>
                Simpan Data
            </button>
        </div>
    </div>
    </form>
        @endif
    @else
        <div class="alert alert-danger">
            <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i> Mohon Maaf, Klik <strong>Perbaiki
                    Data Pendaftaran</strong> terlebih dahulu.</p>
        </div>
    @endif
</x-Pendaftaran.apps>
