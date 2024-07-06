@extends('template')

@section('content')
<h1>Operational - Tambah Data</h1>

<form action="{{ route('operational.store') }}" method="post">
    @csrf
    <div style="margin-bottom: 10px;">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="biaya">Biaya:</label>
        <input type="number" id="biaya" name="biaya" min="1" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" required>
    </div>
    <div style="margin-bottom: 10px;">
        <button type="submit">Simpan</button>
    </div>
</form>
<a href="{{ route('stock.index') }}">Kembali</a>
@endsection