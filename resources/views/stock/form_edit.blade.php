@extends('template')

@section('content')
<form action="{{ route('stock.update', $stock->id) }}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="nama_sepatu">Nama Sepatu</label>
        <input type="text" name="nama_sepatu" value="{{ $stock->nama_sepatu ?? '' }}">
    </div>
    <div>
        <label for="hpp">HPP</label>
        <input type="number" name="hpp" value="{{ $stock->hpp ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran37">Ukuran 37</label>
        <input type="number" name="ukuran37" value="{{ $stock->ukuran37 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran38">Ukuran 38</label>
        <input type="number" name="ukuran38" value="{{ $stock->ukuran38 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran39">Ukuran 39</label>
        <input type="number" name="ukuran39" value="{{ $stock->ukuran39 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran40">Ukuran 40</label>
        <input type="number" name="ukuran40" value="{{ $stock->ukuran40 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran41">Ukuran 41</label>
        <input type="number" name="ukuran41" value="{{ $stock->ukuran41 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran42">Ukuran 42</label>
        <input type="number" name="ukuran42" value="{{ $stock->ukuran42 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran43">Ukuran 43</label>
        <input type="number" name="ukuran43" value="{{ $stock->ukuran43 ?? 0 }}" min="0">
    </div>
    <div>
        <label for="ukuran44">Ukuran 44</label>
        <input type="number" name="ukuran44" value="{{ $stock->ukuran44 ?? 0 }}" min="0">
    </div>
    <div>
        <input type="submit" value="Simpan">
    </div>
</form>
@endsection