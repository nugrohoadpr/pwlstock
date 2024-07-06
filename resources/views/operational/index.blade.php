@extends('template')

@section('content')
<h1>Operational</h1>

<a href="{{ route('operational.create') }}" class="btn btn-primary">add</a>

<table class="stock-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Biaya</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($operational as $ops)
    <tr>
        <td>{{ $ops->tanggal }}</td>
        <td>{{ $ops->nama }}</td>
        <td>{{ $ops->biaya }}</td>
        <td>{{ $ops->keterangan }}</td>
        <td>
            <a href="/operational/{{ $ops->id }}/edit/" class="btn btn-warning">Edit</a> 
            <form action="{{ route('operational.destroy', $ops->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>             
    </tr>
    @endforeach
</table>
@endsection