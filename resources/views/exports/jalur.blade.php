<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datas as $data)
        <tr>
            <td>{{ $data->nisn }}</td>
            <td>{{ $data->id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
