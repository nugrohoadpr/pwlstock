@extends('template')

@section('content')
<h1>Edit Data Barang Keluar</h1>

<form action="{{ route('barangkeluar.update', $barangkeluar->id) }}" method="post">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 10px;">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="{{ $barangkeluar->tanggal }}" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="nama_sepatu_id">Nama Sepatu:</label>
        <select id="nama_sepatu_id" name="nama_sepatu_id" required>
            @foreach($stocks as $stock)
                <option value="{{ $stock->id }}" {{ $barangkeluar->nama_sepatu_id == $stock->id ? 'selected' : '' }}>{{ $stock->nama_sepatu }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="jenis_keluar">Type</label>
        <select name="jenis_keluar" id="jenis_keluar" class="form-control">
            <option value="TIKTOK">TIKTOK</option>
            <option value="SHOPEE">SHOPEE</option>
            <option value="OFFLINE">OFFLINE</option>
            <option value="DROPSHIP">DROPSHIP</option>
            <option value="LAZADA">LAZADA</option>
            <option value="TOKOPEDIA">TOKOPEDIA</option>
        </select>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="link">Link:</label>
        <input type="text" id="link" name="link" value="{{ $barangkeluar->link }}" required>
    </div>
    <div style="margin-bottom: 10px;">
        <label for="hargajual">Harga Jual:</label>
        <input type="number" id="hargajual" name="hargajual" value="{{ $barangkeluar->hargajual }}" required>
    </div>
    @for ($i = 37; $i <= 44; $i++)
        <div class="form-group">
            <label for="ukuran{{ $i }}">Ukuran {{ $i }}</label>
            <input type="number" name="ukuran{{ $i }}" class="form-control" min="0" value="{{ $barangkeluar->{'ukuran' . $i} ?? 0 }}">
        </div>
    @endfor
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<a href="{{ route('barangkeluar.index') }}">Kembali</a>
@endsection