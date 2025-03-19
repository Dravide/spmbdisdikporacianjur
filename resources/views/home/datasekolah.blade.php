<x-home.app>
    <section class="hero-4 pb-5 pt-7 py-sm-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h1 class="hero-title mb-3">Daftar Sekolah</h1>
                </div>
            </div>
            <!-- meta start -->

                <div class="table-responsive-lg w-lg-75 mx-lg-auto">
                    <table class="table">
                        <thead class="text-center">
                        <tr class="border-top">
                            <th scope="col" class="w-50"></th>
                            <th scope="col">
                                <span class="text-dark">NPSN</span>
                            </th>
                            <th scope="col" class="border-start border-end">
                                <span class="text-dark">Alamat</span>
                            </th>
                            <th scope="col" class="">
                                <span class="text-dark">Detail</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                        <tr class="border-top">
                            <td><strong>{{$data->nama_sekolah}}</strong></td>
                            <td class="text-center">
                                    {{ $data->npsn }}
                            </td>
                            <td class="text-left border-start border-end">
                                   {{ $data->alamat_jalan }}
                            </td>
                            <td class="text-center">
                                <a href="{{route('datasekolah')}}/{{$data->id}}" class="btn btn-sm btn-outline-success">Detail</a>

                            </td>
                        </tr>
                        @endforeach
                            </tbody>
                    </table>
                </div>

            <!-- meta end -->
        </div>
    </section>
</x-home.app>
