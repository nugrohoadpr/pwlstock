@extends('template')

@section('content')
<h1>Daftar Barang Keluar</h1>

<a href="{{ route('barangkeluar.create') }}" class="btn btn-primary">add</a>

<table class="stock-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Sepatu</th>
            <th>Jenis Keluar</th>
            <th>Link</th>
            <th>Harga Jual</th>
            <th>Ukuran 37</th>
            <th>Ukuran 38</th>
            <th>Ukuran 39</th>
            <th>Ukuran 40</th>
            <th>Ukuran 41</th>
            <th>Ukuran 42</th>
            <th>Ukuran 43</th>
            <th>Ukuran 44</th>
            <th>Keuntungan</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($barangkeluars as $barang)
    <tr>
        <td>{{ $barang->tanggal }}</td>
        <td>{{ $barang->stock->nama_sepatu }}</td>
        <td>{{ $barang->jenis_keluar }}</td>
        <td><a href="{{ $barang->link }}" target="_blank">Link</a></td>
        <td>{{ $barang->hargajual }}</td>
        <td>{{ $barang->ukuran37 }}</td>
        <td>{{ $barang->ukuran38 }}</td>
        <td>{{ $barang->ukuran39 }}</td>
        <td>{{ $barang->ukuran40 }}</td>
        <td>{{ $barang->ukuran41 }}</td>
        <td>{{ $barang->ukuran42 }}</td>
        <td>{{ $barang->ukuran43 }}</td>
        <td>{{ $barang->ukuran44 }}</td>
        <td>{{ $barang->profit }}</td>
        <td>
            <a href="/barangkeluar/{{ $barang->id }}/edit/" class="btn btn-warning">Edit</a>
            <form action="barangkeluar/{{ $barang->id }}/" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>             
    </tr>
    @endforeach
</table>
@endsection