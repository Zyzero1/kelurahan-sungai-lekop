@extends('layouts.admin')


@section('content')
<div class="p-6">


<h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>


<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    
    <div class="bg-blue-600 text-white p-6 rounded-xl shadow">
        <h2 class="text-sm uppercase opacity-80">Total Profil</h2>
        <p class="text-4xl font-bold mt-2">{{ $totalProfil }}</p>
    </div>

    
    <div class="bg-green-600 text-white p-6 rounded-xl shadow">
        <h2 class="text-sm uppercase opacity-80">Total Layanan</h2>
        <p class="text-4xl font-bold mt-2">{{ $totalLayanan }}</p>
    </div>

    
    <div class="bg-yellow-500 text-white p-6 rounded-xl shadow">
        <h2 class="text-sm uppercase opacity-80">Total Berita</h2>
        <p class="text-4xl font-bold mt-2">{{ $totalBerita }}</p>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartData');


new Chart(ctx, {
type: 'bar',
data: {
labels: ['Profil', 'Layanan', 'Berita'],
datasets: [{
label: 'Jumlah Data',
data: [{{ $totalProfil }}, {{ $totalLayanan }}, {{ $totalBerita }}],
backgroundColor: ['#2563eb', '#16a34a', '#ca8a04']
}]
}
});
</script>
@endsection