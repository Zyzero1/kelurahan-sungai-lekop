@extends('layouts.admin')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Layanan</h1>

    <form action="{{ route('admin.layanan.update', $layanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nama Layanan</label>
            <input type="text"
                name="nama"
                value="{{ old('nama', $layanan->nama) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi"
                rows="4"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Persyaratan</label>
            <div class="space-y-2" id="persyaratanContainer">
                @php
                $persyaratanArray = !empty($layanan->persyaratan) ? explode("\n", $layanan->persyaratan) : [];
                @endphp
                @foreach($persyaratanArray as $index => $syarat)
                @if(trim($syarat) !== '')
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600 w-8">{{ $index + 1 }}.</span>
                    <input type="text" name="persyaratan_items[]" value="{{ trim($syarat) }}"
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <button type="button" onclick="removeLayananRequirement(this)"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold text-lg w-6 h-6 flex items-center justify-center rounded-full border-2 border-red-800 shadow-md transition-all hover:scale-110">
                        ×
                    </button>
                </div>
                @endif
                @endforeach
                @if(empty($persyaratanArray) || count(array_filter($persyaratanArray, 'trim')) === 0)
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-600 w-8">1.</span>
                    <input type="text" name="persyaratan_items[]" value=""
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                        placeholder="Masukkan persyaratan">
                    <button type="button" onclick="removeLayananRequirement(this)"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold text-lg w-6 h-6 flex items-center justify-center rounded-full border-2 border-red-800 shadow-md transition-all hover:scale-110">
                        ×
                    </button>
                </div>
                @endif
            </div>
            <button type="button" onclick="addLayananRequirement()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
            </button>

            <!-- Hidden field to store combined persyaratan -->
            <input type="hidden" name="persyaratan" id="persyaratanCombined" value="{{ old('persyaratan', $layanan->persyaratan) }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-300">
                <option value="aktif" {{ old('status', $layanan->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="non_aktif" {{ old('status', $layanan->status) === 'non_aktif' ? 'selected' : '' }}>Non Aktif</option>
            </select>
        </div>

        <div class="flex gap-3">
            <button class="bg-blue-700 text-white px-5 py-2 rounded hover:bg-blue-800">
                Update
            </button>
            <a href="{{ route('admin.layanan.index') }}"
                class="px-5 py-2 rounded border">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Debug: Check if script is loaded
    console.log('Layanan edit script loaded');

    function addLayananRequirement() {
        console.log('addLayananRequirement called');

        const container = document.getElementById('persyaratanContainer');
        if (!container) {
            console.error('Container not found');
            return;
        }

        const items = container.querySelectorAll('.flex.items-center.gap-2');
        const index = items.length;
        console.log('Current items:', items.length, 'New index:', index);

        const newRequirement = document.createElement('div');
        newRequirement.className = 'flex items-center gap-2';
        newRequirement.innerHTML = `
            <span class="text-sm text-gray-600 w-8">${index + 1}.</span>
            <input type="text" name="persyaratan_items[]" value=""
                class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                placeholder="Masukkan persyaratan baru">
            <button type="button" onclick="removeLayananRequirement(this)" 
                class="bg-red-600 hover:bg-red-700 text-white font-bold text-lg w-6 h-6 flex items-center justify-center rounded-full border-2 border-red-800 shadow-md transition-all hover:scale-110">
                ×
            </button>
        `;

        container.appendChild(newRequirement);
        updateLayananRequirementNumbers();
        console.log('New requirement added');
    }

    function removeLayananRequirement(button) {
        console.log('removeLayananRequirement called');

        const container = document.getElementById('persyaratanContainer');
        const itemToRemove = button.closest('.flex');

        // Don't remove if it's the last item
        const items = container.querySelectorAll('.flex.items-center.gap-2');
        if (items.length > 1) {
            itemToRemove.remove();
            updateLayananRequirementNumbers();
            console.log('Requirement removed');
        } else {
            // Clear the value instead of removing the last item
            const input = itemToRemove.querySelector('input');
            if (input) {
                input.value = '';
            }
            console.log('Last item cleared instead of removed');
        }
    }

    function updateLayananRequirementNumbers() {
        console.log('updateLayananRequirementNumbers called');

        const container = document.getElementById('persyaratanContainer');
        const items = container.querySelectorAll('.flex.items-center.gap-2');
        console.log('Updating numbers for', items.length, 'items');

        items.forEach((item, index) => {
            const numberSpan = item.querySelector('.text-sm.text-gray-600');
            if (numberSpan) {
                const newNumber = `${index + 1}.`;
                numberSpan.textContent = newNumber;
                console.log(`Updated item ${index} to ${newNumber}`);
            }
        });
    }

    // Test function - call from console
    window.testAddRequirement = function() {
        console.log('Test function called');
        addLayananRequirement();
    };

    // Make functions global
    window.addLayananRequirement = addLayananRequirement;
    window.removeLayananRequirement = removeLayananRequirement;
    window.updateLayananRequirementNumbers = updateLayananRequirementNumbers;

    // Combine all persyaratan items before form submission
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, setting up form handler');

        const form = document.querySelector('form[method="POST"]');
        if (form) {
            form.addEventListener('submit', function() {
                console.log('Form submitted, combining persyaratan');

                const inputs = document.querySelectorAll('input[name="persyaratan_items[]"]');
                const values = Array.from(inputs)
                    .map(input => input.value.trim())
                    .filter(value => value !== '');

                console.log('Persyaratan values:', values);

                const combinedField = document.getElementById('persyaratanCombined');
                combinedField.value = values.join('\n');
                console.log('Combined value:', combinedField.value);
            });
        } else {
            console.error('Form not found');
        }
    });
</script>
@endpush