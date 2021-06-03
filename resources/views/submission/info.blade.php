<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 20px;" align="center">No.</th>
            <th style="width: 200px;" align="center">Nama</th>
            <th style="width: 300px;" align="center">Feedback</th>
            <th style="width: 180px;" align="center">Waktu</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i=0;
        @endphp
        @foreach($data as $d)
        <tr>
            <td align="center">{{++$i}}.</td>
            <td>{{$d->user->name}}</td>
            <td>{{$d->info}}</td>
            <td>{{tgl(date_format($d->created_at,'Y-m-d'))}} {{date_format($d->created_at,'H:i')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
