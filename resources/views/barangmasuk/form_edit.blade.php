@extends('template')

@section('content')
<div class="container">
    <h2>Tambah Barang Masuk</h2>
    <form action="{{ route('barangmasuk.update', $barangmasuk->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_sepatu_id">Nama Sepatu</label>
            <select name="nama_sepatu_id" id="nama_sepatu_id" class="form-control">
                @foreach($stock as $stock)
                    <option value="{{ $stock->id }}" {{ $barangmasuk->nama_sepatu_id == $stock->id ? 'selected' : '' }}>{{ $stock->nama_sepatu }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="RETUR" {{ $barangmasuk->type == 'RETUR' ? 'selected' : '' }}>RETUR</option>
                <option value="NEW"  {{ $barangmasuk->type == 'NEW' ? 'selected' : '' }}>NEW</option>
            </select>
        </div>
        @for ($i = 37; $i <= 44; $i++)
            <div class="form-group">
                <label for="ukuran{{ $i }}">Ukuran {{ $i }}</label>
                <input type="number" name="ukuran{{ $i }}" class="form-control" min="0" value="{{ $barangmasuk->{'ukuran' . $i} ?? 0 }}">
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection