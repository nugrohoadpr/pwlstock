@extends('template')

@section('content')
    <div style="width: 80%; margin: auto;">
        <canvas id="profitOmsetChart"></canvas>
    </div>

    <div style="width: 80%; margin: auto; margin-top: 50px;">
        <table id="profitOmsetTable" class="display">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Omzet (Rp)</th>
                    <th>Profit (Rp)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->date }}</td>
                    <td>{{ number_format($row->omset, 2, ',', '.') }}</td>
                    <td>{{ number_format($row->profit, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready( function () {
            $('#profitOmsetTable').DataTable();
        } );

        var ctx = document.getElementById('profitOmsetChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line', // atau 'bar' untuk grafik batang
            data: {
                labels: @json($data->pluck('date')),
                datasets: [
                    {
                        label: 'Omzet',
                        data: @json($data->pluck('omset')),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'Profit',
                        data: @json($data->pluck('profit')),
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        fill: true,
                        tension: 0.1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nilai (Rp)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection