<div class="row">
    <div class="col-md-6">
        @if($isiData)
            @if($data->id_berkas == 5)
                <div class="row mb-2">
                    @foreach($isiData->DataNilai as $data)
                        <div class="col-md-4">
                            <p class="mb-0">Kelas {{strtoupper(str_replace("'", "",$data->key))}} : </p><span
                                class="badge bg-info p-1">Ranking {{$data->value}}</span>
                        </div>
                    @endforeach
                </div>
            @elseif($data->id_berkas == 8)
                <div class="row mb-2">
                    <div class="row mb-2">
                        <h4 class="card-title">Data Prestasi</h4>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Prestasi</th>
                                    <th>Lomba</th>
                                    <th>Tingkat</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($isiData->DataPrestasi as $data)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>Juara {{$data->juara}}</td>
                                        <td>{{$data->lomba}}</td>
                                        <td>
                                            @if($data->tingkat == 1)
                                                Internasional
                                            @elseif($data->tingkat == 2)
                                                Nasional
                                            @elseif($data->tingkat == 3)
                                                Provinsi
                                            @elseif($data->tingkat == 4)
                                                Kabupaten
                                            @elseif($data->tingkat == 5)
                                                Kecamatan
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>

{{--                    @foreach($isiData as $value)--}}
{{--                        <div class="col-md-12 text-left">--}}
{{--                            <ul>--}}
{{--                                <li><p class="mb-0">Juara {{$value->juara}} Lomba {{$value->lomba}} Tingkat--}}
{{--                                        : {{$value->tingekat}}</p></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                </div>
            @elseif($data->id_berkas == 10)
                <div class="row mb-2">
                    @foreach($isiData->DataNilai as $value)
                        <div class="col-md-12 text-left">
                            <p class="mb-0">Surat Afirmasi : {{$value->value}}</p>
                        </div>
                    @endforeach
                </div>
            @elseif($data->id_berkas == 14)
                <div class="row mb-2">
                    @foreach($isiData->DataNilai as $hasil)
                        <div class="col-md-2 text-center">
                            <button type="button" class="btn btn-sm btn-outline-secondary my-1">
                                {{ Str::upper($hasil->key)  }} <span class="badge bg-danger ms-1">{{ $hasil->value }}</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @elseif($data->id_berkas == 6)
                <div class="row mb-2">
                    @foreach($isiData->DataNilai as $hasil)
                        <div class="col-md-2 text-center">
                                <button type="button" class="btn btn-sm btn-outline-secondary my-1">
                                    {{ Str::upper($hasil->key)  }} <span class="badge bg-danger ms-1">{{ $hasil->value }}</span>
                                </button>
                        </div>
                    @endforeach
                </div>
            @elseif($data->id_berkas == 7)
                <div class="row">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            @foreach($isiData->DataNilai as $hasil)
                             <button type="button" class="btn btn-sm btn-outline-secondary my-1 mx-2">
                                                {{ Str::upper($hasil->key)  }} <span class="badge bg-danger ms-1">{{ $hasil->value }}</span>
                                            </button>
                                <!--<tr>-->
                                <!--    <th scope="row" class="p-0 align-middle">-->
                                <!--        <div class="avatar-xs">-->
                                <!--            <span class="avatar-title rounded-circle bg-soft-primary text-success">-->
                                <!--                {{ $hasil->key }}-->
                                <!--            </span>-->
                                <!--        </div>-->
                                <!--    </th>-->
                                <!--    <td class="p-0">-->

                                <!--            <button type="button" class="btn btn-sm btn-outline-secondary my-1">-->
                                <!--                {{ Str::upper($hasil->key)  }} <span class="badge bg-danger ms-1">{{ $hasil->value }}</span>-->
                                <!--            </button>-->

                                <!--    </td>-->
                                <!--</tr>-->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="row mb-2">
                    <h4 class="text-center">## {{ $data->users->dataPendaftar->dapodik->nama }} ##</h4>
                    <div id="map" style="width:auto; height: 250px;" class="rounded-2"></div>
                </div>
            @endif
        @else
            @if($data->id_berkas == 2)
                <div class="row mb-2">
                    <h4 class="text-center">##</h4>
                    <div id="maps" style="width:auto; height: 100%; min-height: 350px"></div>
                </div>
            @else
                <h5 class="my-2 text-center">#</h5>
            @endif
        @endif
    </div>
    <div class="col-md-6">
        <div class="text-center">
            <div id='viewer' style='width:auto;height:600px;margin:0 auto'></div>
{{--            {{ $data->data_berkas }}--}}
        </div>
    </div>
</div>
<script src="{{ asset('assets/libs/pdfjsexpress/webviewer.min.js') }}"></script>
<script>
    WebViewer({
        path: '/assets/libs/pdfjsexpress',
        licenseKey: 'Psn9n4HD1XeCQB8ygtq4',
        initialDoc: '{{ Storage::url($isiData->data_berkas) }}',
    }, document.getElementById('viewer'))
        .then(instance => {
            const {
                Core,
                UI
            } = instance;
            Core.documentViewer.addEventListener('documentLoaded', () => {
                console.log('document loaded');
            });
            Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
                console.log(`Page number is: ${pageNumber}`);
            });
        });
</script>





