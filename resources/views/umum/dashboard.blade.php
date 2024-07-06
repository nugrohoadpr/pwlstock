@extends('template')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Dashboard 1 Bulan</h1>

        <div class="row text-center mb-4">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Total Omzet</h3>
                        <p class="fs-5">Rp {{ number_format($totalOmzet, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Total Operasional</h3>
                        <p class="fs-5">Rp {{ number_format($totalOperational, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Total Aset Barang</h3>
                        <p class="fs-5">Rp {{ number_format($totalAsetBarang, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Total Barang Terjual</h3>
                        <p class="fs-5">{{ number_format($totalBarangTerjual, 0, ',', '.') }} Pasang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h3>Total Profit</h3>
                        <p class="fs-5">Rp {{ number_format($totalProfit, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <canvas id="profitOmzetChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('profitOmzetChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', // atau 'line' untuk grafik garis
            data: {
                labels: ['Omzet', 'Operasional', 'Aset Barang', 'Barang Terjual', 'Profit'],
                datasets: [
                    {
                        label: 'Nilai (Rp)',
                        data: [
                            {{ $totalOmzet }},
                            {{ $totalOperational }},
                            {{ $totalAsetBarang }},
                            {{ $totalBarangTerjual }},
                            {{ $totalProfit }}
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nilai (Rp)'
                        }
                    }
                }
            }
        });
    </script>
@endsection