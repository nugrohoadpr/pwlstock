@extends('template')

@section('content')
<h1>Operational - Edit Data</h1>

<form action="{{ route('operational.update', $operational->id) }}" method="post">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 10px;">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ $operational->tanggal }}" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ $operational->nama }}" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="biaya">Biaya:</label>
        <input type="number" id="biaya" name="biaya" value="{{ $operational->biaya }}" min="1" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="{{ $operational->keterangan }}" required>
    </div>
    <div style="margin-bottom: 10px;">
        <button type="submit">Update</button>
    </div>
</form>
<a href="{{ route('stock.index') }}">Kembali</a>
@endsection