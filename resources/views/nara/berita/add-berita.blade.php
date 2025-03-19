@push('css')
    <!-- quill css -->
    <link href="{{asset('assets/libs/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
@endpush
<x-apps>
    <x-title-nara>
        <x-slot name="title">Tambah Berita</x-slot>
    </x-title-nara>
    <div class="row card card-body">
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Judul Berita</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="" id="example-text-input">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3 row">
                    <label class="col-2 form-label">Image</label>
                    <input type="file" class="filestyle col-8" data-buttonname="btn-secondary">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div id="email-editor" style="height: 300px;">


            </div> <!-- end email-editor-->
            <button class="btn btn-primary mt-3 float-end">Buat Berita!</button>

        </div>
    </div>


</x-apps>
@push('scr')

@endpush
