@extends('layouts.owner')

@section('content')

{{-- SUMMARY --}}
<div class="grid md:grid-cols-4 gap-6 mb-10">

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-slate-500">Total Pesanan</p>
        <p class="text-2xl font-bold">{{ $totalPesanan }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-slate-500">Total Omzet</p>
        <p class="text-2xl font-bold text-emerald-600">
            Rp {{ number_format($totalOmzet) }}
        </p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-slate-500">Sedang Dikirim</p>
        <p class="text-2xl font-bold">{{ $sedangKirim }}</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <p class="text-sm text-slate-500">Selesai</p>
        <p class="text-2xl font-bold">{{ $selesai }}</p>
    </div>

</div>

{{-- GRAFIK --}}
<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-lg font-bold mb-4">
        📊 Omzet Bulanan {{ now()->year }}
    </h2>

    <canvas id="omzetChart"></canvas>
</div>

<script>
const ctx = document.getElementById('omzetChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ],
        datasets: [{
            label: 'Omzet (Rp)',
            data: {!! json_encode(
                array_values(
                    array_replace(array_fill(1,12,0), $omzetBulanan->toArray())
                )
            ) !!},
            backgroundColor: '#10b981'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endsection
