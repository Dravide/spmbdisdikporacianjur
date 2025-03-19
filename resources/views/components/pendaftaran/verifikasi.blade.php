<div class="table-responsive">
    <table class="table table-sm mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Berkas</th>
            <th class="text-center">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $hasil)

            <tr>
                <th scope="row" class="align-middle">
                    <img class="avatar-xs" alt="" src="{{ $hasil->svg }}">
                </th>
                <td class="align-middle">{{ $hasil->nama_berkas }}</td>
                <td class="text-center align-middle"><p class="my-1"><i
                            class="mdi mdi-@if($hasil->status == 'terima')check-decagram @elseif($hasil->status == 'tolak')alert-decagram @else()decagram @endif  text-@if($hasil->status == 'terima')info @elseif($hasil->status == 'tolak')danger @else()warning @endif font-size-17"
                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                            data-bs-original-title="@if($hasil->status == 'terima')Terverifikasi @elseif($hasil->status == 'tolak')Perlu Perbaikan @else()Dalam Proses Verifikasi @endif"></i>
                    </p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
