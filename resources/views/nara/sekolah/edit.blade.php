<x-apps>
    <x-title-nara>
        <x-slot name="title">
            {{ __('Edit Sekolah '.$sekolah->nama_sekolah) }}
        </x-slot>
    </x-title-nara>
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Kesalahan!</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{ route('sekolah.update', $sekolah->id) }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>#Identitas Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <x-form.input
                                    name="npsn"
                                    id="npsn"
                                    label="NPSN"
                                    type="number"
                                    value="{{ $sekolah->npsn }}"
                                    readonly="true"/>
                                <x-form.input
                                    name="lat"
                                    id="lat"
                                    label="Latitude"
                                    type="text"
                                    value="{{ $sekolah->lintang }}"
                                />
                                <x-form.input
                                    name="lon"
                                    id="lon"
                                    label="Longitude"
                                    type="text"
                                    value="{{ $sekolah->bujur }}"
                                />
                            </div>
                            <div class="col-md-7">
                                <x-form.input
                                    name="nama_sekolah"
                                    id="nama_sekolah"
                                    label="Nama Sekolah"
                                    value="{{ $sekolah->nama_sekolah }}"
                                    readonly="true"
                                />
                                <label for="alamat" class="mt-2">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="5"
                                          class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') ? old('alamat') : $sekolah->alamat_jalan }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4>#Logo Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-2">
                                    <img class="avatar-lg" alt="200x200" src="{{ Storage::url($sekolah->img) }}"
                                         data-holder-rendered="true">
                                </div>
                            </div>
                            <div class="col-md-10">
                                <input type="file" class="filepond" name="folder">
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4>#Kredensial Sekolah</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <x-form.input
                                    name="operator"
                                    id="operator"
                                    label="Nama Operator"
                                    value="{{ $sekolah->operator }}"
                                    :hint-text="__('Nama Operator Sekolah')"
                                />
                            </div>
                            <div class="col-md-7">
                                <x-form.input
                                    name="password"
                                    id="password"
                                    label="Password"
                                    type="password"
                                    :hint-text="__('Kosongkan jika tidak ingin mengubah password')"
                                />
                                <x-form.input
                                    name="confirm_password"
                                    id="confirm_password"
                                    label="Konfirmasi Password"
                                    type="password"
                                    :hint-text="__('Kosongkan jika tidak ingin mengubah password')"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save-all"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @push('css')
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
                        process: '{{ route('sekolah.upload') }}',
                        revert: '{{ route('sekolah.delete') }}',
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
</x-apps>
