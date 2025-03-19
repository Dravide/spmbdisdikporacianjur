<table>
    <thead>
    <tr>

        @foreach($data as $hasil)
            @foreach($hasil as $key => $value)
                <th>{{ \Str::upper($key ?? '') }}</th>
            @endforeach
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($data as $hasils)
        @foreach($hasils as $out)
            <td>{{ $out ?? '' }}</td>
        @endforeach
    @endforeach
    </tbody>
</table>
