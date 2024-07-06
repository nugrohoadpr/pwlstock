@extends('template')

@section('content')
<h1>Barang Masuk</h1>

<a href="{{ route('barangmasuk.create') }}" class="btn btn-primary">add</a>

<table class="stock-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Sepatu</th>
            <th>Type</th>
            <th>Size 37</th>
            <th>Size 38</th>
            <th>Size 39</th>
            <th>Size 40</th>
            <th>Size 41</th>
            <th>Size 42</th>
            <th>Size 43</th>
            <th>Size 44</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($barangmasuks as $barangmasuk)
    <tr>
        <td>{{ $barangmasuk->created_at }}</td>
        <td>{{ $barangmasuk->stock->nama_sepatu }}</td>
        <td>{{ $barangmasuk->type }}</td>
        <td>{{ $barangmasuk->ukuran37 }}</td>
        <td>{{ $barangmasuk->ukuran38 }}</td>
        <td>{{ $barangmasuk->ukuran39 }}</td>
        <td>{{ $barangmasuk->ukuran40 }}</td>
        <td>{{ $barangmasuk->ukuran41 }}</td>
        <td>{{ $barangmasuk->ukuran42 }}</td>
        <td>{{ $barangmasuk->ukuran43 }}</td>
        <td>{{ $barangmasuk->ukuran44 }}</td>
        <td>
            <a href="/barangmasuk/{{ $barangmasuk->id }}/edit/" class="btn btn-warning">Edit</a>
            <form action="barangmasuk/{{ $barangmasuk->id }}/" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>             
    </tr>
    @endforeach
</table>
@endsection