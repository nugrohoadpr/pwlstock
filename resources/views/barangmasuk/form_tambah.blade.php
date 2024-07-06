@extends('template')

@section('content')

<div class="container">
    <h2>Tambah Barang Masuk</h2>
    <form action="{{ route('barangmasuk.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_sepatu_id">Nama Sepatu</label>
            <select name="nama_sepatu_id" id="nama_sepatu_id" class="form-control">
                @foreach($namastock as $stock)
                    <option value="{{ $stock->id }}">{{ $stock->nama_sepatu }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="RETUR">RETUR</option>
                <option value="NEW">NEW</option>
            </select>
        </div>

        @for ($i = 37; $i <= 44; $i++)
            <div class="form-group">
                <label for="ukuran{{ $i }}">Ukuran {{ $i }}</label>
                <input type="number" name="ukuran{{ $i }}" class="form-control" value="0" min="0" required>
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection