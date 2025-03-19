<div class="card">
    <div class="card-body">
        <form action="{{ route('updatedata') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless" id="dynamicAddRemove">
                        <tr>
                            <th>Prestasi</th>
                            <th>Tambah</th>
                        </tr>
                        @if($hasil->DataPrestasi->count() > 0)
                            @foreach($hasil->DataPrestasi as $key => $data)
                                <tr>
                                    <td>

                                        <div class="input-group">
                                            <div class="input-group-text">Juara</div>
                                            <select class="form-select" id="inlineFormSelectPref"
                                                    name="data[{{ $loop->iteration }}][juara]" required>
                                                <option selected="">Juara</option>
                                                <option value="1" @selected($data->juara == 1)>1</option>
                                                <option value="2" @selected($data->juara == 2)>2</option>
                                                <option value="3" @selected($data->juara == 3)>3</option>
                                            </select>
                                            <div class="input-group-text">Tingkat</div>
                                            <select class="form-select" id="inlineFormSelectPref"
                                                    name="data[{{ $loop->iteration }}][tingkat]" required>
                                                <option selected="" disabled>Tingkat</option>
                                                <option value="1" @selected($data->tingkat == 1)>Internasional</option>
                                                <option value="2" @selected($data->tingkat == 2)>Nasional</option>
                                                <option value="3" @selected($data->tingkat == 3)>Provinsi</option>
                                                <option value="4" @selected($data->tingkat == 4)>Kabupaten</option>
                                                <option value="5" @selected($data->tingkat == 5)>Kecamatan</option>

                                            </select>
                                            <div class="input-group-text">Nama Lomba</div>
                                            <input type="text" class="form-control"
                                                   name="data[{{ $loop->iteration }}][lomba]"
                                                   id="inlineFormInputGroupUsername" placeholder="Lomba"
                                                   value="{{ $data->lomba }}" required>
                                            <input type="hidden" name="data[{{ $loop->iteration }}][prestasi]"
                                                   value="prestasi{{ $loop->iteration }}">
                                        </div>
                                    </td>
                                    <td>
                                        @if($loop->iteration > 1)
                                            <button type="button" class="btn btn-danger remove-input-field"><i
                                                    class="mdi mdi-card-minus"></i></button>
                                        @else
                                            <button type="button" name="add" id="dynamic-ar"
                                                    class="btn btn-primary">
                                                <i class="mdi mdi-card-plus"></i>
                                            </button>
                                        @endif
                                    </td>
                            @endforeach
                        @else
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-text">Juara</div>
                                        <select class="form-select" id="inlineFormSelectPref" name="data[1][juara]"
                                                required>
                                            <option selected="" disabled>Juara</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <div class="input-group-text">Tingkat</div>
                                        <select class="form-select" id="inlineFormSelectPref" name="data[1][tingkat]"
                                                required>
                                            <option selected="" disabled>Tingkat</option>
                                            <option value="1">Internasional</option>
                                            <option value="2">Nasional</option>
                                            <option value="3">Provinsi</option>
                                            <option value="4">Kabupaten</option>
                                            <option value="5">Kecamatan</option>
                                        </select>
                                        <div class="input-group-text">Nama Lomba</div>
                                        <input type="text" class="form-control" name="data[1][lomba]"
                                               id="inlineFormInputGroupUsername" placeholder="Lomba" required>
                                        <input type="hidden" name="data[1][prestasi]" value="prestasi1">
                                    </div>
                                </td>
                                <td>
                                    <button type="button" name="add" id="dynamic-ar" class="btn btn-primary">
                                        <i class="mdi mdi-card-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-soft-info waves-effect mt-0"><i
                            class="mdi mdi-content-save-outline"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        var i = 1;

        $("#dynamic-ar").click(function () {
            if (i < 3) {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><div class="input-group"><div class="input-group-text">Juara</div> <select class="form-select" id="inlineFormSelectPref" name="data[' + i + '][juara]"> <option selected="" disabled>Juara</option> <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> </select> <div class="input-group-text">Tingkat</div> <select class="form-select" id="inlineFormSelectPref" name="data[' + i + '][tingkat]"> <option selected="" disabled>Tingkat</option> <option value="1">Internasional</option> <option value="2">Nasional</option> <option value="3">Provinsi</option> <option value="4">Kabupaten</option> <option value="5">Kecamatan</option> </select> <div class="input-group-text">Nama Lomba</div> <input type="text" class="form-control" name="data[' + i + '][lomba]" id="inlineFormInputGroupUsername" placeholder="Lomba"><input type="hidden" name="data[' + i + '][prestasi]" value="prestasi' + i + '"></div></td><td><button type="button" class="btn btn-danger remove-input-field"><i class="mdi mdi-card-minus"></i></button></td></tr>'
                );
            } else {
                Swal.fire({
                    title: 'Batas Tercapai',
                    text: "Anda hanya dapat menambahkan hingga dua elemen.",
                    icon: 'info',
                    confirmButtonColor: '#557ef8',
                    confirmButtonText: 'OK'
                });
            }
        });

        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
            --i; // Decrement the counter when an element is removed
        });
    </script>

@endpush
