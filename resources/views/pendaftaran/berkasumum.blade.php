<x-Pendaftaran.apps title="Berkas Umum">
    @if((Auth::user()->dataPendaftar->konfir == 2 or Auth::user()->dataPendaftar->konfir == 0))
        @if(Auth::user()->dataPendaftar->id_sekolah == null)
            <div class="alert alert-danger">
                <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i> Silahkan Isi
                    <strong>Sekolah Tujuan</strong> terlebih dahulu.</p>
            </div>
        @else
            @foreach($berkasumum as $data)
                <x-Pendaftaran.berkas berkas="{{ $data->nama_berkas }}" ekstensi=".jpg, .png, .gif dan .pdf"
                                      id="{{ $data->id }}">
                    <x-slot name="icon">
                        {{ $data->svg }}
                    </x-slot>
                </x-Pendaftaran.berkas>

            @endforeach
        @endif
    @else
        <div class="alert alert-danger">
            <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i> Mohon Maaf, Klik <strong>Perbaiki
                    Data Pendaftaran</strong> terlebih dahulu.</p>
        </div>
    @endif
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet"/>
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
              rel="stylesheet"/>
        <link href="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.css"
              rel="stylesheet">

    @endpush
    @push('js')
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond-plugin-pdf-preview/dist/filepond-plugin-pdf-preview.min.js"></script>
        <script
            src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script
            src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                event.preventDefault();
                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Ingin Menghapus Berkas ini!",
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
                    timer: 1000
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

        <script type="text/javascript">
            $(document).ready(function () {
                $('.offcanvas').on('show.bs.offcanvas', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    //menggunakan fungsi ajax untuk pengambilan data
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'get',
                        url: '{{ route('pendaftaran.berkasumum') }}',
                        data: 'id=' + rowid,
                        beforeSend: function () {
                            $('.data').html('<i class="mdi mdi-spin mdi-loading"></i>');
                        },
                        success: function (data) {
                            $('.data').html(data); //menampilkan data ke dalam modal
                        }
                    });
                });
            });
        </script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginPdfPreview);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            // get a collection of elements with class filepond
            const inputElements = document.querySelectorAll('input.filepond');

            // loop over input elements
            Array.from(inputElements).forEach(inputElement => {

                // create a FilePond instance at the input element location
                FilePond.create(inputElement);
                FilePond.setOptions({
                    server: {
                        process: '{{ route('pendaftaran.upload') }}',
                        revert: '{{ route('pendaftaran.delete') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    },
                    allowPdfPreview: true,
                    pdfPreviewHeight: 400,
                    pdfComponentExtraParams: 'toolbar=0&navpanes=0&scrollbar=0&view=fitH',
                    labelIdle: 'Drag & Drop filenya atau <span class="filepond--label-action">Pilih</span>',
                    allowFileSizeValidation: true,
                    maxFileSize: '5MB',
                    allowFileTypeValidation: true,
                    acceptedFileTypes: ['application/pdf', 'image/*'],
                });
            })
        </script>
    @endpush
</x-Pendaftaran.apps>
