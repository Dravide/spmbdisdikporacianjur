<x-operator.apps>
    <div class="row">
        <div class="card card-body">
            <h2 class="mb-0">Unduh Excel</h2>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Jalur</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Jalur Zonasi</td>
                                <td><a href="{{route('operator.excel.zonasi')}}" class="btn btn-sm btn-soft-primary">Unduh
                                        Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jalur Prestasi Ranking</td>
                                <td><a href="{{route('operator.excel.ranking')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Jalur Prestasi Raport</td>
                                <td><a href="{{route('operator.excel.raport')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Jalur Prestasi Akademik & Non Akademik</td>
                                <td><a href="{{route('operator.excel.pana')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Jalur Prestasi Tahfidz</td>
                                <td><a href="{{route('operator.excel.tahfidz')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Jalur Afirmasi</td>
                                <td><a href="{{route('operator.excel.afirmasi')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Jalur Pindah Tugas Orang Tua</td>
                                <td><a href="{{route('operator.excel.pindahtugas')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Jalur Anak Guru</td>
                                <td><a href="{{route('operator.excel.anakguru')}}" class="btn btn-sm btn-soft-primary">Unduh Data</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-5">

                </div>


            </div>
        </div>


    </div>
</x-operator.apps>

