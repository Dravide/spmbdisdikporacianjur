<x-Pendaftaran.apps title="Sekolah Tujuan">
    @if((Auth::user()->dataPendaftar->konfir == 2 or Auth::user()->dataPendaftar->konfir == 0))
        @if(Auth::user()->dataPendaftar->id_jalur == null)
            <div class="alert alert-danger">
                <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i>Silahkan Isi <strong>Formulir</strong>
                    terlebih dahulu.</p>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('sekolah-tujuan.update') }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="id_sekolah" id="pilihan">
                                            <option></option>
                                            @foreach($sekolahs as $sekolah)
                                                <option
                                                    value="{{ $sekolah->id }}" @selected($tujuan->id_sekolah == $sekolah->id)>{{ $sekolah->nama_sekolah }}
                                                    ({{ $sekolah->jarak }} Meter)
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-soft-pink btn"><i class="mdi mdi-content-save-all"></i>
                                            Simpan
                                        </button>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-1 mb-0">Pastikan klik tombol Simpan setelah memilih sekolah
                                            tujuan!</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="mapid" style="height: 500px;" class="rounded-3"></div>
                </div>
            </div>
        @endif
    @else
        <div class="alert alert-danger">
            <p class="font-size-20 text-center my-1"><i class="mdi mdi-information"></i> Mohon Maaf, Klik <strong>Perbaiki
                    Data Pendaftaran</strong> terlebih dahulu.</p>
        </div>
    @endif
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}"/>
        <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    @endpush
    @push('js')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <script>
            // Creating map options
            var mapOptions = {
                center: [{{ Auth::user()->dataPendaftar->koordinat->latitude ?? -6.814632 }}, {{ Auth::user()->dataPendaftar->koordinat->longitude ?? 107.1318 }}],
                zoom: 16
            }
            // Creating a map object
            var map = new L.map('mapid', mapOptions);
            // Creating a Layer object
            var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            L.marker([{{ Auth::user()->dataPendaftar->koordinat->latitude ?? -6.814632 }}, {{ Auth::user()->dataPendaftar->koordinat->longitude ?? 107.1318 }}]).addTo(map)
                .bindPopup("Lokasi Rumah").openPopup();
            var popup = L.popup();
            // Adding layer to the map
            map.addLayer(layer);
        </script>
        <script>
            $(document).ready(function () {
                $('.select2').select2({
                    placeholder: 'Pilih Sekolah Tujuan',
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
    @endpush
</x-Pendaftaran.apps>
