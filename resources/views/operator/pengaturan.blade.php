@push('css')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' type="text/css"/>
    <link rel="stylesheet"
          href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
          type="text/css">
@endpush

<x-operator.apps title="Pengaturan">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="card card-body">
            <h2 class="mb-0">Identitas Sekolah</h2>
            <hr>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div id="maps" class=""  style="width:auto; height: 450px;">

                    </div>

            </div>
                <form method="POST" action="{{route('operator.post-pengaturan')}}">
                    @csrf
            <div class="row">




                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="nama_sekolah">Nama Sekolah</label>
                        <input type="text" class="form-control " name="nama_sekolah" id="nama_sekolah" placeholder="" value="{{$data->nama_sekolah}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="npsn">NPSN</label>
                        <input
                            type="number"
                            class="form-control "
                            placeholder=""
                            value="{{$data->npsn}}" disabled
                        >
                    </div>
                    <label for="img" class="mt-2">Logo Sekolah</label>
                    <input type="file" name="img" id="img" accept="image/*"
                           class="form-control "/>
                    <div class="form-group mt-2">
                        <label for="lat">Latitude</label>
                        <input
                            type="text"
                            class="form-control "
                            name="lat"
                            id="lat"
                            placeholder=""
                            value="{{$data->lintang}}"
                        >
                    </div>


                    <div class="form-group mt-2">
                        <label for="lon">Longitude</label>
                        <input
                            type="text"
                            class="form-control "
                            name="lon"
                            id="lon"
                            placeholder=""
                            value="{{$data->bujur}}"
                        >
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="email">No. HP</label>
                        <input
                            type="text"
                            class="form-control "
                            name="telp"
                            id="telp"
                            placeholder=""
                            value="{{$data->telp}}"
                        >
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Operator</label>
                        <input
                            type="text"
                            class="form-control "
                            name="operator"
                            id="operator"
                            placeholder=""
                            value="{{$data->operator}}"
                        >
                    </div>
                    <label for="alamat" class="mt-2">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3"
                              class="form-control ">{{$data->alamat_jalan}}</textarea>
                       
                    <div class="form-check form-switch form-switch-md mt-2">
                        <input class="form-check-input" type="checkbox" name="pengumuman" id="pengumuman"
                               value="{{ $data->pengumuman == 1 ? 0 : 1 }}" {{ $data->pengumuman == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="pengumuman">Pengumuman
                            Mandiri</label>
                    </div>       
                    <div class="form-group mt-2">
                        <label for="email">Link Pengumuman Mandiri</label>
                        <input
                            type="text"
                            class="form-control "
                            name="linkPengumuman"
                            id="operator"
                            placeholder="https://domainsekolah.sch.id/pengumuman-ppdb"
                            value="{{$data->link_pengumuman}}"
                        >
                    </div>
                    
                    <!--<div class="form-check form-switch form-switch-md mt-2">-->
                    <!--    <input class="form-check-input" type="checkbox" name="pro" id="pro"-->
                    <!--           value="{{ $data->propagasi == 1 ? 1 : 0 }}" {{ $data->propagasi == 1 ? 'checked' : '' }}>-->
                    <!--    <label class="form-check-label" for="propagasi">Propagasi</label>-->
                    <!--</div>-->

                </div>
                <div class="d-block mt-3">
                    <button class="btn btn-primary d-block w-100">Simpan!</button>
                </div>
                </form>


            </div>
        </div>

            <h2 class="mb-0 mt-5">Ganti Password</h2>
            <hr>


            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <img src="{{asset('assets/images/operator/credential.png')}}" class="w-75 img-fluid">

                </div>
                <div class="col-md-6">
                    <h2>Ganti Password</h2>
                    <form method="POST" action="{{route('operator.post-ganti-password')}}">
                        @csrf
                        <div>
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-12 col-form-label">Password Baru</label>
                                <div class="col-md-12">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="example-password-input1">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}

                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-password-input" class="col-md-12 col-form-label">Konfirmasi Password Baru</label>
                                <div class="col-md-12">
                                    <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" id="example-password-input2">
                                    @error('confirm_password')
                                    <div class="invalid-feedback">
                                        {{$message}}

                                    </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-danger w-100">Batal</a>
                            </div>

                            <div class="col-6">
                                <button class="btn btn-primary w-100">Ganti!</button>
                            </div>

                        </div>
                    </form>


                </div>

            </div>

    </div>


        @push('js')
            <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
            <script
                src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
            <script>
                $(document).ready(function () {
                    mapboxgl.accessToken =
                        "pk.eyJ1IjoiZHJhdmlkZSIsImEiOiJjbGd5em0xOGwwZWh4M3NxaGxnbXVyYTF2In0.4xmUqmQ12FgEsHF8o4bUNw";
                    var map = new mapboxgl.Map({
                        container: "maps",
                        style: "mapbox://styles/dravide/clgyzsnrw00g601pg7p0rb7el",
                        center: [107.13182, -6.81463],
                        zoom: 10,
                    });
                    // console.log(lat, lon);
                    var latSekolah = {{$data->lat}};
                    var longSekolah = {{$data->lon}};

                    var marker = new mapboxgl.Marker({ color: "#4aa3ff" })
                        .setLngLat([longSekolah, latSekolah])
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

