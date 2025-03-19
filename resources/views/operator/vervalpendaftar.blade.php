@php use Carbon\Carbon; @endphp
<x-operator.apps>
    <div class="card">
        <h4 class="card-header bg-light"><a href="{{ route('operator.verval', $data->id_jalur) }}"
                                            class="btn btn-soft-info btn-sm waves-effect waves-light"><i
                    class="mdi mdi-arrow-left-bold-box"></i> Kembali</a>
        </h4>
        <h4 class="card-header bg-info text-white">Data Diri</h4>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h4 class=""><i class="mdi mdi-check-decagram text-info"></i>
                                {{ $data->dapodik->nama }} <span
                                    class="badge bg-light">{{ $data->users->username }}</span>
                            </h4>
                            <dl class="row mb-0">
                                <dt class="col-sm-3">NIK</dt>
                                <dd class="col-sm-9">: {{ $data->dapodik->nik }}</dd>
                                <dt class="col-sm-3">NISN</dt>
                                <dd class="col-sm-9">: {{ $data->dapodik->nisn }}</dd>
                                <dt class="col-sm-3">Jenis Kelamin</dt>
                                <dd class="col-sm-9">
                                    : {{ $data->dapodik->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
                                <dt class="col-sm-3">Tempat Lahir</dt>
                                <dd class="col-sm-9">: {{ $data->dapodik->tempat_lahir }}</dd>
                                <dt class="col-sm-3">Tanggal Lahir</dt>
                                <dd class="col-sm-9">
                                    : {{ Carbon::parse($data->dapodik->tanggal_lahir)->translatedFormat('d F Y') }} <span class="badge badge-soft-info">{{ Carbon::parse($data->dapodik->tanggal_lahir)->age }} Tahun</span>
                                </dd>
                                <dt class="col-sm-3">Alamat</dt>
                                <dd class="col-sm-9">: {{ $data->dapodik->alamat_jalan }} RT {{ $data->dapodik->rt }}
                                    RW {{ $data->dapodik->rw }} Desa {{ $data->dapodik->desa }}
                                    Dusun {{ $data->dapodik->dusun }}
                                </dd>
                                <dt class="col-sm-3"><i class=""></i> Jarak </dt>
                                <dd class="col-sm-9">: <span class="badge bg-info">{{ $out }} M</span></dd>
                                <hr class="my-2">
                                <dt class="col-sm-3"> Whatsapp </dt>
                                <dd class="col-sm-9">: {{ $data->whatsapp }} </dd>
                                <dt class="col-sm-3"> Asal Sekolah </dt>
                                <dd class="col-sm-9">: {{ $data->asal_sekolah->nama }} </dd>
                                <dt class="col-sm-3"> Jalur </dt>
                                <dd class="col-sm-9">: {{ $data->jalur->nama_jalur }} </dd>

                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div id="map" style="width:auto; height: 320px;" class="rounded-2"></div>
                </div>

            </div>

        </div>
        <h4 class="card-header bg-info text-white" id="scroll">Verifikasi dan Validasi Berkas</h4>
        <div class="card-body">
            <x-operator.verval jalur="{{ $data->id_jalur }}" id="{{ $data->users->username }}"/>
        </div>
        <h4 class="card-header bg-info text-white" id="scroll">Pesan Notifikasi</h4>

            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                    <form action="{{ route('operator.verval.whatsapp') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="no_hp" value="{{ $data->whatsapp }}">
                                    <input type="hidden" name="nisn" value="{{ $data->dapodik->nisn }}">
                                    <textarea id="textarea" class="form-control" maxlength="225" rows="7"
                                              placeholder="Pesan Notifikasi" name="pesan"></textarea>
                                    <button type=submit class="btn btn-success mt-2"><i class="mdi mdi-whatsapp"></i> Kirim Pesan</button>
                                </form>
                </div>
                </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h3 class="card-title">PESAN WHATSAPP</h3>
                            <div class="pe-2" data-simplebar="init" style="max-height: 200px;"><div class="simplebar-wrapper" style="margin: 0px -16px 0px 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px 16px 0px 0px;">
                                                    @foreach($whatsapp as $pesan)
                                                        <div class="text-body d-block border-bottom">
                                                            <div class="d-flex py-3">
                                                                <div class="flex-grow-1 overflow-hidden">
{{--                                                                    <h5 class="font-size-16 mb-1">{{ $pesan->receiver }}</h5>--}}
                                                                    <p class="text-justify mb-0 me-3">
                                                                        {{ $pesan->message }}
                                                                    </p>
                                                                </div>
                                                                <div class="flex-shrink-0 font-size-13 fw-bold">
                                                                    {{ Carbon::parse($pesan->created_at)->diffForHumans()  }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 403px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 204px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div>
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
            $(document).ready(function () {

                mapboxgl.accessToken =
                    "pk.eyJ1IjoicHBkYnNtcGRpc2Rpa3BvcmFjaWFuanVyIiwiYSI6ImNsdDVlYml1cDBkNDgybW8waHI1OGhwa2IifQ.whC4Fw1qIp4n4_5NR1rWGQ";
                var map = new mapboxgl.Map({
                    container: "map",
                    style: "mapbox://styles/ppdbsmpdisdikporacianjur/clwqfi7hu011w01pn8dj96c3d",
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
</x-operator.apps>
