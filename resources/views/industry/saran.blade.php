<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Saran</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
    @php
        $i=0;
    @endphp
    @foreach($data as $d)
        <tr>
            <td>{{++$i}}.</td>
            <td>{{$d->user->name}}</td>
            <td>{{$d->saran}}</td>
            <td>{{tgl(date_format($d->created_at,'Y-m-d'))}} {{date_format($d->created_at,'H:i')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
