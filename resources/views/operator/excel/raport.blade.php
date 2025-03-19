<table>
    <thead>
    <tr>
        <th>No.</th>
        <th>NISN</th>
        <th>Username</th>
        <th>ID Jalur</th>
        <th>Jenis Pendaftaran</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>NIK</th>
        <th>Alamat</th>
        <th>RT</th>
        <th>RW </th>
        <th>Desa</th>
        <th>Dusun</th>
        <th>Whatsapp</th>
        <th>Nama Ibu</th>
        <th>Pekerjaan Ibu</th>
        <th>Penghasilan Ibu</th>
        <th>Nama Ayah</th>
        <th>Pekerjaan Ayah</th>
        <th>Penghasilan Ayah</th>
        <th>Asal Sekolah</th>
        <th>Lat</th>
        <th>Lon</th>
        <th>Jarak</th>
        <th>Nilai Raport</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($hsl as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nisn}}</td>
            <td>{{$data->username}}</td>
            <td>{{$data->id_jalur}}</td>
            <td>{{$data->jenis}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->tempat_lahir}}</td>
            <td>{{$data->tanggal_lahir}}</td>
            <td>'{{$data->nik}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->rt}}</td>
            <td>{{$data->rw}}</td>
            <td>{{$data->desa}}</td>
            <td>{{$data->dusun}}</td>
            <td>{{$data->whatsapp}}</td>
            <td>{{$data->nama_ibu}}</td>
            <td>{{$data->pekerjaan_ibu}}</td>
            <td>{{$data->penghasilan_ibu}}</td>
            <td>{{$data->nama_ayah}}</td>
            <td>{{$data->pekerjaan_ayah}}</td>
            <td>{{$data->penghasilan_ayah}}</td>
            <td>{{$data->skl}}</td>
            <td>{{$data->lat}}</td>
            <td>{{$data->lon}}</td>
            <td>{{$data->jarak}}</td>
            <td>{{$data->isVerified}}</td>

        </tr>
    @endforeach
    </tbody>
</table>