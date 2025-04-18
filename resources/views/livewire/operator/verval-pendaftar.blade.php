@php use Carbon\Carbon; @endphp
<div>
    <div class="card shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <div>
                <a href="{{ route('operator.verval', $data->id_jalur) }}" class="btn btn-soft-info btn-sm waves-effect waves-light">
                    <i class="mdi mdi-arrow-left-bold-box"></i> Kembali
                </a>
            </div>
            <h5 class="mb-0 text-muted">Detail Pendaftar</h5>
        </div>
        
        <div class="card-body p-0">
            <div class="p-3 border-bottom bg-info text-white">
                <h5 class="mb-0 text-white"><i class="mdi mdi-account-circle me-1 "></i> Data Diri</h5>
            </div>
            
            <div class="p-4">
                <div class="row">
                    <div class="col-md-7">
                        <div class="d-flex align-items-center mb-3">
                            <h4 class="mb-0">
                                <i class="mdi mdi-check-decagram text-info me-1"></i>
                                {{ $data->dapodik->nama }}
                            </h4>
                            <span class="badge bg-light ms-2">{{ $data->users->username }}</span>
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="border rounded p-3 h-100">
                                    <p class="text-muted mb-1 small">Identitas</p>
                                    <div class="mb-2">
                                        <label class="small text-muted d-block">NIK</label>
                                        <div class="fw-medium">{{ $data->dapodik->nik }}</div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="small text-muted d-block">NISN</label>
                                        <div class="fw-medium">{{ $data->dapodik->nisn }}</div>
                                    </div>
                                    <div>
                                        <label class="small text-muted d-block">Jenis Kelamin</label>
                                        <div class="fw-medium">{{ $data->dapodik->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="border rounded p-3 h-100">
                                    <p class="text-muted mb-1 small">Kelahiran</p>
                                    <div class="mb-2">
                                        <label class="small text-muted d-block">Tempat Lahir</label>
                                        <div class="fw-medium">{{ $data->dapodik->tempat_lahir }}</div>
                                    </div>
                                    <div>
                                        <label class="small text-muted d-block">Tanggal Lahir</label>
                                        <div class="fw-medium">
                                            {{ Carbon::parse($data->dapodik->tanggal_lahir)->translatedFormat('d F Y') }}
                                            <span class="badge badge-soft-info ms-1">{{ Carbon::parse($data->dapodik->tanggal_lahir)->age }} Tahun</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="border rounded p-3">
                                    <p class="text-muted mb-1 small">Alamat & Informasi Tambahan</p>
                                    <div class="mb-2">
                                        <label class="small text-muted d-block">Alamat Lengkap</label>
                                        <div class="fw-medium">{{ $data->dapodik->alamat_jalan }} RT {{ $data->dapodik->rt }}
                                            RW {{ $data->dapodik->rw }} Desa {{ $data->dapodik->desa }}
                                            Dusun {{ $data->dapodik->dusun }}</div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <label class="small text-muted d-block">Jarak</label>
                                            <div><span class="badge bg-info">{{ $distance['meters'] }} M</span></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="small text-muted d-block">Whatsapp</label>
                                            <div class="fw-medium">{{ $data->whatsapp }}</div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="small text-muted d-block">Asal Sekolah</label>
                                            <div class="fw-medium">{{ $data->asal_sekolah->nama }}</div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <label class="small text-muted d-block">Jalur Pendaftaran</label>
                                        <div><span class="badge bg-primary">{{ $data->jalur->nama_jalur }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="border rounded h-100">
                            <div class="p-2 bg-light rounded-top border-bottom">
                                <span class="small text-muted"><i class="mdi mdi-map-marker me-1"></i>Lokasi Pendaftar</span>
                            </div>
                            <div id="map" style="width:auto; height: 350px;" class="rounded-bottom"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <div class="p-3 border-bottom bg-info text-white">
                <h5 class="mb-0 text-white" id="scroll"><i class="mdi mdi-file-document-multiple me-1"></i> Verifikasi dan Validasi Berkas</h5>
            </div>
            <div class="p-4">
                <livewire:operator.verval-berkas jalur="{{ $data->id_jalur }}" id="{{ $data->users->username }}"/>
            </div>
        </div>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="p-3 border-bottom bg-info text-white">
                <h5 class="mb-0 text-white"><i class="mdi mdi-bell me-1"></i> Pesan Notifikasi</h5>
            </div>
            <div class="p-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="border rounded p-3">
                            <h6 class="mb-3">Kirim Notifikasi WhatsApp</h6>
                            <form wire:submit.prevent="kirimWhatsapp">
                                <input type="hidden" name="no_hp" value="{{ $data->whatsapp }}">
                                <input type="hidden" name="nisn" value="{{ $data->dapodik->nisn }}">
                                <textarea id="textarea" class="form-control" maxlength="225" rows="5"
                                          placeholder="Ketik pesan notifikasi di sini..." wire:model="pesan"></textarea>
                                <button type="submit" class="btn btn-success mt-3">
                                    <i class="mdi mdi-whatsapp me-1"></i> Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border rounded h-100">
                            <div class="p-3 bg-light border-bottom">
                                <h6 class="mb-0">Riwayat Pesan</h6>
                            </div>
                            <div class="pe-2" data-simplebar="init" style="max-height: 250px;">
                                <div class="simplebar-wrapper" style="margin: 0px -16px 0px 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: -17px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                                <div class="simplebar-content" style="padding: 0px 16px 0px 0px;">
                                                    @foreach($whatsapp as $pesan)
                                                        <div class="text-body border-bottom">
                                                            <div class="d-flex p-3">
                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <p class="text-justify mb-0 me-3 small">
                                                                        {{ $pesan->message }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex-shrink-0 font-size-13 text-muted small">
                                                                    {{ Carbon::parse($pesan->created_at)->diffForHumans() }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: auto; height: 403px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                    <div class="simplebar-scrollbar" style="height: 204px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('css')
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' type="text/css"/>
        <link rel="stylesheet"
              href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
              type="text/css">
    @endpush

    @push('js')
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
        <script
            src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
        <script type="text/javascript">
            document.addEventListener('livewire:initialized', function () {
                mapboxgl.accessToken =
                    "pk.eyJ1IjoicHBkYnNtcGRpc2Rpa2NpYW5qdXIiLCJhIjoiY204ZnNrbHNoMGczdDJqcHhucTdjZmNtZyJ9.Ary-pbzrfR8kLH-A13ZWLw";
                var map = new mapboxgl.Map({
                    container: "map",
                    style: "mapbox://styles/mapbox/streets-v12",
                    center: [{{ $data->koordinat->longitude }}, {{ $data->koordinat->latitude }}],
                    zoom: 17,
                });
                var marker = new mapboxgl.Marker({color: "#4aa3ff"})
                    .setLngLat([{{ $data->koordinat->longitude }}, {{ $data->koordinat->latitude }}])
                    .addTo(map);
                map.addControl(
                    new MapboxGeocoder({
                        accessToken: mapboxgl.accessToken,
                        mapboxgl: mapboxgl,
                    })
                );
            });
        </script>
    @endpush
</div>