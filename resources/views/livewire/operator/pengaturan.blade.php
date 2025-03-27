<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h4 class="card-header bg-dark text-white">Pengaturan</h4>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 {{ $activeTab == 'identitas' ? 'active' : '' }}" 
                           wire:click.prevent="setActiveTab('identitas')" href="#" role="tab">
                            <i class="dripicons-home me-2 align-middle"></i> Identitas Sekolah
                        </a>
                        <a class="nav-link mb-2 {{ $activeTab == 'password' ? 'active' : '' }}" 
                           wire:click.prevent="setActiveTab('password')" href="#" role="tab">
                            <i class="dripicons-lock me-2 align-middle"></i> Ganti Password
                        </a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content mt-4 mt-sm-0">
                        <!-- Identitas Sekolah Tab -->
                        <div class="tab-pane fade {{ $activeTab == 'identitas' ? 'show active' : '' }}" role="tabpanel">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <h5 class="mb-3">Identitas Sekolah</h5>
                            <div class="row">
                                {{-- <div class="col-md-12 mb-3">
                                    <div id="maps" class="" style="width:auto; height: 450px;"></div>
                                </div> --}}

                                <form wire:submit.prevent="saveIdentitas">
                                    <div class="row">
                                        <!-- Rest of the form content remains the same -->
                                        <div class="col-md-6">
                                            <div class="form-group mt-2">
                                                <label for="nama_sekolah">Nama Sekolah</label>
                                                <input type="text" class="form-control" wire:model="nama_sekolah" id="nama_sekolah" placeholder="">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="npsn">NPSN</label>
                                                <input type="number" class="form-control" value="{{ $npsn }}" disabled>
                                            </div>
                                            <label for="img" class="mt-2">Logo Sekolah</label>
                                            <x-filepond::upload wire:model="img" />
                                            <div class="form-group mt-2">
                                                <label for="lat">Latitude</label>
                                                <input type="text" class="form-control" wire:model="lat" id="lat" placeholder="">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="lon">Longitude</label>
                                                <input type="text" class="form-control" wire:model="lon" id="lon" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2">
                                                <label for="telp">No. HP</label>
                                                <input type="text" class="form-control" wire:model="telp" id="telp" placeholder="">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="operator">Operator</label>
                                                <input type="text" class="form-control" wire:model="operator" id="operator" placeholder="">
                                            </div>
                                            <label for="alamat" class="mt-2">Alamat</label>
                                            <textarea wire:model="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                                            
                                            <div class="form-check form-switch form-switch-md mt-2">
                                                <input class="form-check-input" type="checkbox" wire:model="pengumuman" id="pengumuman">
                                                <label class="form-check-label" for="pengumuman">Pengumuman Mandiri</label>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="linkPengumuman">Link Pengumuman Mandiri</label>
                                                <input type="text" class="form-control" wire:model="linkPengumuman" id="linkPengumuman" 
                                                    placeholder="https://domainsekolah.sch.id/pengumuman-ppdb">
                                            </div>
                                        </div>
                                        <div class="d-block mt-3">
                                            <button type="submit" class="btn btn-dark d-block w-100">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Ganti Password Tab -->
                        <div class="tab-pane fade {{ $activeTab == 'password' ? 'show active' : '' }}" role="tabpanel">
                            @if (session()->has('password_message'))
                                <div class="alert alert-success">
                                    {{ session('password_message') }}
                                </div>
                            @endif

                            <h5 class="mb-3">Ganti Password</h5>

                            <div class="row align-items-center">
                                <div class="col-md-6 text-center">
                                    <img src="{{asset('assets/images/operator/credential.png')}}" class="w-75 img-fluid">
                                </div>
                                <div class="col-md-6">
                                    <form wire:submit.prevent="updatePassword">
                                        <div>
                                            <div class="mb-3 row">
                                                <label for="password" class="col-md-12 col-form-label">Password Baru</label>
                                                <div class="col-md-12">
                                                    <input class="form-control @error('password') is-invalid @enderror" type="password" 
                                                        wire:model="password" id="password">
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="confirm_password" class="col-md-12 col-form-label">Konfirmasi Password Baru</label>
                                                <div class="col-md-12">
                                                    <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" 
                                                        wire:model="confirm_password" id="confirm_password">
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
                                                <a href="{{ url()->previous() }}" class="btn btn-secondary w-100">Batal</a>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary w-100">Ganti!</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @filepondScripts
    <script>
        document.addEventListener('livewire:load', function () {
            mapboxgl.accessToken = "pk.eyJ1IjoiZHJhdmlkZSIsImEiOiJjbGd5em0xOGwwZWh4M3NxaGxnbXVyYTF2In0.4xmUqmQ12FgEsHF8o4bUNw";
            var map = new mapboxgl.Map({
                container: "maps",
                style: "mapbox://styles/dravide/clgyzsnrw00g601pg7p0rb7el",
                center: [107.13182, -6.81463],
                zoom: 10,
            });
            
            var latSekolah = @this.lat;
            var longSekolah = @this.lon;

            var marker = new mapboxgl.Marker({ color: "#4aa3ff" })
                .setLngLat([longSekolah, latSekolah])
                .addTo(map);

            map.addControl(
                new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    mapboxgl: mapboxgl,
                })
            );
            
            // Update lat/lon when marker is moved
            map.on('click', function(e) {
                marker.setLngLat(e.lngLat);
                @this.lat = e.lngLat.lat;
                @this.lon = e.lngLat.lng;
            });
        });
    </script>
    @endpush
</div>