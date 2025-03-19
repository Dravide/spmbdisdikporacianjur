<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="faq-box d-flex">
                    <div class="flex-shrink-0 me-2">
                        <div class="avatar-xs">
                            <img class="rounded-circle header-profile-user"
                                 src="{{ $icon }}"
                                 alt="Berkas">
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-15">{{ $berkas }}</h5>
                        <p class="text-muted">{{ $berkas }} berupa file dengan ektensi <span
                                class="badge badge-soft-danger">{{ $ekstensi }}</span> besar
                            maksimal file adalah <span class="badge badge-soft-success">5MB</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form action="{{ route('uploadberkas') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <input type="hidden" name="idberkas" value="{{ $id }}">
                            <input type="file" class="filepond" name="folder" @if($data) disabled @endif>
                        </div>
                        <div class="col-md-3">
                            <div class="d-grid flex-wrap align-middle">
                                <button type="submit"
                                        class="btn btn-lg btn-soft-info waves-effect waves-light"
                                        @if($data) disabled @endif><i
                                        class="mdi mdi-content-save"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        @if($data)
                            <form action="{{ route('hapusberkas') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <button type="submit"
                                        class="btn btn-sm btn-soft-danger waves-effect waves-light me-1 show_confirm"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title=""
                                        data-bs-original-title="Hapus Berkas">
                                    <i class="mdi mdi-trash-can-outline"></i>
                                </button>

                                <button class="btn btn-sm btn-soft-dark waves-effect waves-light"
                                        type="button"
                                        data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight"
                                        aria-controls="offcanvasRight"
                                        data-id="{{ $data->id }}">
                                    <i class="mdi mdi-eye-outline"></i> Preview
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Form Bukti Ranking--}}
@if($id == 5 && $data)
    <x-Pendaftaran.berkas.bukti-ranking id="{{ $data->id }}"/>
@endif
{{--End Form Bukti Ranking--}}

{{--Form Raport Kelas 5 Semester 1 s.d. 6 Semester 1--}}
@if($id == 6 && $data)
    <x-Pendaftaran.berkas.raport-kelas-51-61 id="{{ $data->id }}"/>
@endif
{{--End Form Raport Kelas 5 Semester 1 s.d. 6 Semester 1--}}

{{--Form Raport Kelas 4 Semester 1 s.d. 6 Semester 1--}}
@if($id == 7 && $data)
    <x-Pendaftaran.berkas.raport-kelas-41-61 id="{{ $data->id }}"/>
@endif
{{--End Form Raport Kelas 4 Semester 1 s.d. 6 Semester 1--}}

{{--Form Bukti Prestasi--}}
@if($id == 8 && $data)
    <x-Pendaftaran.berkas.bukti-prestasi id="{{ $data->id }}"/>
@endif
{{--End Form Bukti Prestasi--}}

{{--Form Bukti Afirmasi--}}
@if($id == 10 && $data)
    <x-Pendaftaran.berkas.afirmasi id="{{ $data->id }}"/>
@endif
{{--End Form Bukti Afirmasi--}}

{{--Form Sertifikat Akreditasi--}}
@if($id == 14 && $data)
    <x-Pendaftaran.berkas.akreditasi id="{{ $data->id }}"/>
@endif
{{--End Form Sertifikat Akreditasi--}}
