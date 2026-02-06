@extends('layouts.admin')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Layanan</h1>

        <div class="flex gap-2">
            <button onclick="toggleAllCheckboxes()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm">
                Select All
            </button>
            <a href="{{ route('admin.layanan.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Layanan
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="w-full border text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-2 border w-12">
                    <input type="checkbox" id="selectAll" onchange="toggleAllCheckboxes()" class="form-checkbox">
                </th>
                <th class="p-2 border w-12">No</th>
                <th class="p-2 border">Nama Layanan</th>
                <th class="p-2 border">Deskripsi</th>
                <th class="p-2 border">Persyaratan</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($layanans as $layanan)
            <tr class="hover:bg-gray-100">
                <td class="p-2 border text-center">
                    <input type="checkbox" name="selected_layanans[]" value="{{ $layanan->id }}" class="form-checkbox">
                </td>
                <td class="p-2 border text-center">
                    {{ $loop->iteration }}
                </td>
                <td class="p-2 border">
                    {{ $layanan->nama }}
                </td>
                <td class="p-2 border">
                    {{ \Illuminate\Support\Str::limit($layanan->deskripsi, 60) }}
                </td>
                <td class="p-2 border">
                    {{ \Illuminate\Support\Str::limit($layanan->persyaratan ?? '-', 50) }}
                </td>
                <td class="p-2 border text-center">
                    @if($layanan->status === 'aktif')
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Aktif</span>
                    @else
                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Non Aktif</span>
                    @endif
                </td>
                <td class="p-2 border text-center">
                    <a href="{{ route('admin.layanan.edit', $layanan->id) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                        Edit
                    </a>

                    <form action="{{ route('admin.layanan.destroy', $layanan->id) }}"
                        method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus layanan ini?')"
                            class="bg-red-600 text-white px-3 py-1 rounded text-xs">
                            Hapus
                        </button>
                    </form>

                    <form action="{{ route('admin.layanan.toggle-status', $layanan->id) }}"
                        method="POST" class="inline">
                        @csrf
                        @method('PUT')
                        <button onclick="return confirm('Ubah status layanan ini?')"
                            class="bg-purple-600 text-white px-3 py-1 rounded text-xs">
                            {{ $layanan->status === 'aktif' ? 'Non Aktifkan' : 'Aktifkan' }}
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">
                    Belum ada data layanan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection

@push('scripts')
<script>
    function toggleAllCheckboxes() {
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('input[name="selected_layanans[]"]');

        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAll.checked;
        });

        // Save to localStorage
        const selectedIds = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
        localStorage.setItem('selectedLayanans', JSON.stringify(selectedIds));
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Load saved checkboxes from localStorage
        const savedCheckboxes = localStorage.getItem('selectedLayanans');
        if (savedCheckboxes) {
            const selectedIds = JSON.parse(savedCheckboxes);
            selectedIds.forEach(id => {
                const checkbox = document.querySelector(`input[name="selected_layanans[]"][value="${id}"]`);
                if (checkbox) {
                    checkbox.checked = true;
                }
            });
        }

        // Save checkbox state to localStorage when changed
        document.querySelectorAll('input[name="selected_layanans[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allCheckboxes = document.querySelectorAll('input[name="selected_layanans[]"]');
                const selectedIds = Array.from(allCheckboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);

                localStorage.setItem('selectedLayanans', JSON.stringify(selectedIds));
            });
        });
    });
</script>
@endpush