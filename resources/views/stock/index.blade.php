@extends('template')

@section('content')
<h1>Stock</h1>

<a href="{{ route('stock.create') }}" class="btn btn-primary">add</a>

<table class="stock-table">
    <thead>
        <tr>
            <th>Nama sepatu</th>
            <th>HPP</th>
            <th>size 37</th>
            <th>size 38</th>
            <th>size 39</th>
            <th>size 40</th>
            <th>size 41</th>
            <th>size 42</th>
            <th>size 43</th>
            <th>size 44</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($stocks as $stock)
    <tr>
        <td>{{ $stock->nama_sepatu }}</td>
        <td>{{ $stock->hpp }}</td>
        <td>{{ $stock->ukuran37 }}</td>
        <td>{{ $stock->ukuran38 }}</td>
        <td>{{ $stock->ukuran39 }}</td>
        <td>{{ $stock->ukuran40 }}</td>
        <td>{{ $stock->ukuran41 }}</td>
        <td>{{ $stock->ukuran42 }}</td>
        <td>{{ $stock->ukuran43 }}</td>
        <td>{{ $stock->ukuran44 }}</td>
        <td>
            <a href="/stock/{{ $stock->id }}/edit/" class="btn btn-warning">Edit</a>
        </td>             
    </tr>
    @endforeach
</table>
@endsection