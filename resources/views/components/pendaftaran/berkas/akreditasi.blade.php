<div class="card">
    <div class="card-body">
        <form action="{{ route('updatedata') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row">
                <h4 class="card-title">Nilai Akreditasi Sekolah</h4>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label for="akreditasi">Nilai Akreditasi (Angka)</label>
                        <input type="number" class="form-control" name="akreditasi"
                               value="{{ isset($hasil[0]['value']) ? $hasil[0]['value'] : '' }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-soft-info waves-effect mt-3"><i
                            class="mdi mdi-content-save-outline"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
