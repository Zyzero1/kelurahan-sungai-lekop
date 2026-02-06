@extends('layouts.admin')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-lg shadow">

    <h1 class="text-xl font-semibold mb-6">Tambah Layanan</h1>

    <form action="{{ route('admin.layanan.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Nama Layanan</label>
            <input type="text"
                name="nama"
                required
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="deskripsi"
                required
                rows="4"
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">Persyaratan</label>
            <div class="space-y-2" id="persyaratanContainer">
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
            </div>
            <button type="button" onclick="addLayananRequirement()" class="mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                <i class="fas fa-plus mr-1"></i> Tambah Persyaratan
            </button>

            <!-- Hidden field to store combined persyaratan -->
            <input type="hidden" name="persyaratan" id="persyaratanCombined" value="">
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">
                <option value="aktif">Aktif</option>
                <option value="non_aktif">Non Aktif</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit"
                class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">
                Simpan
            </button>

            <a href="{{ route('admin.layanan.index') }}"
                class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                Kembali
            </a>
        </div>
    </form>

</div>
@endsection

@push('scripts')
<script>
    // Debug: Check if script is loaded
    console.log('Layanan create script loaded');

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