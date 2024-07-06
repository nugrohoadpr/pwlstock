@extends('template')

@section('content')

<form action="{{ route('stock.store') }}" method="post">
    @csrf
    <div>
        <label for="nama_sepatu">Nama Sepatu:</label>
        <input type="text" id="nama_sepatu" name="nama_sepatu" required>
    </div>
    <div>
        <label for="warna">Warna:</label>
        <input type="text" id="warna" name="warna" required>
    </div>
    <div>
        <label for="hpp">HPP:</label>
        <input type="number" id="hpp" name="hpp" value="0" required>
    </div>
    <div>
        <label for="ukuran37">Size 37:</label>
        <input type="number" id="ukuran37" name="ukuran37" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran38">Size 38:</label>
        <input type="number" id="ukuran38" name="ukuran38" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran39">Size 39:</label>
        <input type="number" id="ukuran39" name="ukuran39" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran40">Size 40:</label>
        <input type="number" id="ukuran40" name="ukuran40" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran41">Size 41:</label>
        <input type="number" id="ukuran41" name="ukuran41" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran42">Size 42:</label>
        <input type="number" id="ukuran42" name="ukuran42" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran43">Size 43:</label>
        <input type="number" id="ukuran43" name="ukuran43" value="0" min="0" required>
    </div>
    <div>
        <label for="ukuran44">Size 44:</label>
        <input type="number" id="ukuran44" name="ukuran44" value="0" min="0" required>
    </div>
    <div>
        <input type="submit" value="Simpan">
    </div>
</form>
@endsection