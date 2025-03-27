<x-operator.apps title="Pengumuman">
    <form method="POST" action="{{route('operator.pengumumanPost')}}">
        @csrf


    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger">
            Data yang sudah diinput <strong>tidak dapat diupdate.</strong> Silahkan lakukan reset terlebih dahulu apabila terjadi kesalahan, dan lakukan pembaharuan data!
        </div>
        
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Nomor Urut Daftar Ulang</div>
                    <div class="">
                        <table class="table table-borderless" id="dynamicAddRemove">
                        <tr>

                            <th class="pb-0">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>No. Urut Awal</label>
                                </div>
                                <div class="col-md-2">
                                    <label>No. Urut Akhir</label>
                                </div>
                                <div class="col-md-8">
                                    <label>Waktu</label>
                                </div>
                            </div>
                            </th>
                            <th class="pb-0">Action</th>
                        </tr>

                        
                            @if($duCount != 0)
                                @foreach($du as $du)
                                <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input class="form-control" name="" type="number" id="urutAwal" value="{{$du->urutAwal}}" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <input class="form-control" name="" type="number" id="urutAkhir" value="{{$du->urutAkhir}}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" name="" type="datetime-local" value="{{$du->waktuAwal}}" id="waktuAwal" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control" name="" type="datetime-local" value="{{$du->waktuAkhir}}" id="waktuAkhir" disabled>
                                        </div>
                                    </div>
                                </td>
                                 <td>

                                <button type="button" name="add" id="dynamic-ar" class="btn btn-primary" disabled=""><i class="mdi mdi-card-plus"></i></button>
                                </td>
                                </tr>
                                @endforeach
                                
                            @else
                            <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input class="form-control" name="data[1][urutAwal]" type="number" id="urutAwal" placeholder="XX" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" name="data[1][urutAkhir]" type="number" id="urutAkhir" placeholder="XX" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" name="data[1][waktuAwal]" type="datetime-local" value="2024-07-01T08:00:00" id="waktuAwal" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" name="data[1][waktuAkhir]" type="datetime-local" value="2024-07-01T08:00:00" id="waktuAkhir" required>
                                    </div>
                                </div>
                            </td>
                            <td>

                                <button type="button" name="add" id="dynamic-ar" class="btn btn-primary"><i class="mdi mdi-card-plus"></i></button>
                            </td>
                            </tr>
                            @endif
                            
                            

                    </table>

                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Berkas Tambahan yang Harus Dibawa Ketika Daftar Ulang</div>
                    <div class="">Berkas ini akan muncul pada bagian Berkas yang harus dibawa pada saat daftar ulang di bukti kelulusan selain berkas no 1-6 di file bukti kelulusan. Isikan strip (-) pada bagian link berkas untuk data yang tidak harus didownload oleh calon peserta didik baru!</div>
                    <div class="">
                        
                        <table class="table table-borderless" id="dynamicAddRemoveBerkas">
                        <tr>

                            <th class="pb-0">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama Berkas</label>
                                </div>
                                <div class="col-md-8">
                                    <label>Link Berkas</label>
                                </div>
                            </div>
                            </th>
                            <th class="pb-0">Action</th>
                        </tr>
                        @if($bduCount != 0)
                        @foreach($bdu as $bdu)
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" name="" type="text" id="berkas" value="{{$bdu->berkas}}" disabled>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="" type="text" id="link" value="{{$bdu->link}}" disabled>
                                    </div>

                                </div>
                            </td>
                            <td>

                                <button type="button" name="addBerkas" id="dynamic-ar-berkas" class="btn btn-primary" disabled=""><i class="mdi mdi-card-plus"></i></button>
                            </td>
                            </tr>
                        @endforeach
                        
                        @else
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="form-control" name="dataBerkas[1][berkas]" type="text" id="berkas" placeholder="Nama Berkas" required>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="dataBerkas[1][link]" type="text" id="link" placeholder="https://drive.google.com/xx-xxxxxxxxxxx-xxxxxxxxxxxxxxxx" required>
                                    </div>

                                </div>
                            </td>
                            <td>

                                <button type="button" name="addBerkas" id="dynamic-ar-berkas" class="btn btn-primary"><i class="mdi mdi-card-plus"></i></button>
                            </td>
                            </tr>
                        
                        @endif

                        

                    </table>

                    </div>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Informasi tambahan untuk Calon Peserta Didik yang Lulus</div>
                    <div class="card-title-desc">


                    </div>
                        <textarea id="summernote" name="infoTambahan" required="">
                            @if($tambahan == null) 
                            ... 
                            @else 
                            {{$tambahan}}
                            @endif
                        </textarea>
                    <button type="submit" class="btn btn-primary mt-2 w-100" @if($bduCount == 0 && $duCount == 0) @else disabled @endif>Simpan</button>
                    </form>
                 <form method="post" action="{{route('operator.postResetPengumuman')}}">
                     @csrf
                     <input type="hidden" value="{{$idSekolah}}" name="id">
                      <button type="submit" class="btn btn-primary mt-2 w-100" @if($bduCount != 0 && $duCount != 0) @else disabled @endif>Reset</button>
                 </form>
                </div>
                 

            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Preview Bukti Kelulusan
                    </div>
                    <x-operator.previewkelulusan/>
                </div>
            </div>
        </div>
    </div>
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endpush
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    placeholder: 'Informasi Tambahan : (Jika tidak ada, isikan "-")',
                    tabsize: 2,
                    height: 300,
                    toolbar: [
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                    ]
                });
            });
        </script>
        <script type="text/javascript">
        var i = 1;

        $("#dynamic-ar").click(function () {
            console.log("clicked");
            if (i < 15) {
                ++i;
                $("#dynamicAddRemove").append('<tr> <td> <div class="row"> <div class="col-md-2"> <input class="form-control" name="data[' + i + '][urutAwal]" type="number" id="urutAwal-' + i + '" placeholder="XX" required> </div> <div class="col-md-2"> <input class="form-control" name="data[' + i + '][urutAkhir]" type="number" id="urutAkhir-' + i + '" placeholder="XX" required> </div> <div class="col-md-4"> <input class="form-control" name="data[' + i + '][waktuAwal]" type="datetime-local" value="2024-07-01T08:00:00" id="waktu-' + i + '" required> </div><div class="col-md-4"> <input class="form-control" name="data[' + i + '][waktuAkhir]" type="datetime-local" value="2024-07-01T08:00:00" id="waktu-' + i + '" required> </div>  </div> </td> <td> <button type="button" class="btn btn-danger remove-input-field"><i class="mdi mdi-card-minus"></i></button> </td> </tr>'
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
    <script type="text/javascript">
        var j = 1;

        $("#dynamic-ar-berkas").click(function () {
            console.log("clicked");
            if (j < 15) {
                ++j;
                $("#dynamicAddRemoveBerkas").append('<tr> <td> <div class="row"> <div class="col-md-4"> <input class="form-control" name="dataBerkas[' + j + '][berkas]" type="text" id="berkas-' + j + '" placeholder="Nama Berkas" required> </div> <div class="col-md-8"> <input class="form-control" name="dataBerkas[' + j + '][link]" type="text" id="link-' + j + '" placeholder="https://drive.google.com/xx-xxxxxxxxxxx-xxxxxxxxxxxxxxxx" required> </div> </div> </td> <td><button type="button" class="btn btn-danger remove-input-field-berkas"><i class="mdi mdi-card-minus"></i></button></td> </tr>'
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

        $(document).on('click', '.remove-input-field-berkas', function () {
            $(this).parents('tr').remove();
            --j; // Decrement the counter when an element is removed
        });
    </script>
    @endpush
   
</x-operator.apps>
