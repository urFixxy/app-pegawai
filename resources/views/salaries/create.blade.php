@extends('layouts.app')

@section('title', $title)

@section('header')
    <i class="fa-solid fa-sack-dollar mr-2"></i>
    {{ $title }}
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="{{ route('salaries.store') }}" method="POST" class="bg-white p-6 rounded shadow-lg">
            @csrf
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Create Salary</h1>

            <!-- Info Alert -->
            <div class="mb-4 bg-blue-50 border-l-4 border-blue-400 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fa-solid fa-info-circle text-blue-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            <strong>Info:</strong> Basic salary will be automatically taken from the employee's position.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <label for="karyawan_id" class="block text-sm font-medium text-gray-900 mb-1">
                        Employee
                    </label>
                    <select name="karyawan_id" id="karyawan_id"
                        class="block w-full p-2.75 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('karyawan_id') border-red-500 @enderror"
                        required onchange="updateBasicSalary()">
                        <option value="">-- Select Employee --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" data-position="{{ $employee->position->nama_jabatan ?? '-' }}"
                                data-salary="{{ $employee->position ? number_format($employee->position->gaji_pokok, 0, ',', '.') : '0' }}"
                                {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                                @if($employee->position)
                                    - {{ $employee->position->nama_jabatan }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Basic Salary Info (Read-only display) -->
                <div id="basic-salary-info" class="hidden">
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Position</label>
                                <p id="position-display" class="text-sm font-semibold text-gray-900">-</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-600 mb-1">Basic Salary</label>
                                <p id="basic-salary-display" class="text-sm font-semibold text-indigo-600">Rp 0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="bulan" class="block text-sm font-medium text-gray-900 mb-1">
                            Month
                        </label>
                        <select name="bulan" id="bulan"
                            class="block w-full p-2.75 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('bulan') border-red-500 @enderror"
                            required>
                            <option value="">-- Select Month --</option>
                            <option value="January" {{ old('bulan') == 'January' ? 'selected' : '' }}>January</option>
                            <option value="February" {{ old('bulan') == 'February' ? 'selected' : '' }}>February</option>
                            <option value="March" {{ old('bulan') == 'March' ? 'selected' : '' }}>March</option>
                            <option value="April" {{ old('bulan') == 'April' ? 'selected' : '' }}>April</option>
                            <option value="May" {{ old('bulan') == 'May' ? 'selected' : '' }}>May</option>
                            <option value="June" {{ old('bulan') == 'June' ? 'selected' : '' }}>June</option>
                            <option value="July" {{ old('bulan') == 'July' ? 'selected' : '' }}>July</option>
                            <option value="August" {{ old('bulan') == 'August' ? 'selected' : '' }}>August</option>
                            <option value="September" {{ old('bulan') == 'September' ? 'selected' : '' }}>September</option>
                            <option value="October" {{ old('bulan') == 'October' ? 'selected' : '' }}>October</option>
                            <option value="November" {{ old('bulan') == 'November' ? 'selected' : '' }}>November</option>
                            <option value="December" {{ old('bulan') == 'December' ? 'selected' : '' }}>December</option>
                        </select>
                    </div>

                    <!-- Allowance -->
                    <div>
                        <label for="tunjangan" class="block text-sm font-medium text-gray-900 mb-1">
                            Allowance
                        </label>
                        <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', 0) }}" min="0"
                            step="1000"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tunjangan') border-red-500 @enderror"
                            oninput="calculateTotal()">
                        <p class="mt-1 text-xs text-gray-500">Additional allowance for the employee</p>
                    </div>

                    <!-- Deduction -->
                    <div>
                        <label for="potongan" class="block text-sm font-medium text-gray-900 mb-1">
                            Deduction
                        </label>
                        <input type="number" name="potongan" id="potongan" value="{{ old('potongan', 0) }}" min="0"
                            step="1000"
                            class="block w-full p-2.5 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('potongan') border-red-500 @enderror"
                            oninput="calculateTotal()">
                        <p class="mt-1 text-xs text-gray-500">Deductions from salary (late, absence, etc.)</p>
                    </div>

                    <!-- Total Salary (Calculated) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-1">
                            Total Salary (Calculated)
                        </label>
                        <div
                            class="block w-full p-2 rounded-md border border-gray-300 bg-gray-50 font-bold text-indigo-600">
                            Rp <span id="total-salary-display">0</span>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Basic Salary + Allowance - Deduction</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-between">
                <a href="{{ route('salaries.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-md shadow hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Cancel
                </a>
                <button type="submit" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm
                        hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <i class="fa-solid fa-save mr-1"></i> Save
                </button>
            </div>
        </form>
    </div>

    <script>
        let basicSalaryValue = 0;

        function updateBasicSalary() {
            const select = document.getElementById('karyawan_id');
            const selectedOption = select.options[select.selectedIndex];
            const infoDiv = document.getElementById('basic-salary-info');
            const positionDisplay = document.getElementById('position-display');
            const basicSalaryDisplay = document.getElementById('basic-salary-display');

            if (select.value) {
                const position = selectedOption.getAttribute('data-position');
                const salary = selectedOption.getAttribute('data-salary');

                basicSalaryValue = parseFloat(salary.replace(/\./g, '')) || 0;

                positionDisplay.textContent = position;
                basicSalaryDisplay.textContent = 'Rp ' + salary;
                infoDiv.classList.remove('hidden');

                calculateTotal();
            } else {
                infoDiv.classList.add('hidden');
                basicSalaryValue = 0;
                calculateTotal();
            }
        }

        function calculateTotal() {
            const tunjangan = parseFloat(document.getElementById('tunjangan').value) || 0;
            const potongan = parseFloat(document.getElementById('potongan').value) || 0;

            const total = basicSalaryValue + tunjangan - potongan;

            document.getElementById('total-salary-display').textContent =
                total.toLocaleString('id-ID');
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (document.getElementById('karyawan_id').value) {
                updateBasicSalary();
            }
        });
    </script>
@endsection