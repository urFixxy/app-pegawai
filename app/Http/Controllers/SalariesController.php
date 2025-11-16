<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalariesController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Salaries';
        
        $query = Salary::with('employee');

        // Search functionality - search by employee name
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('employee', function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nomor_telepon', 'like', "%{$search}%");
            });
        }

        // Filter by month
        if ($request->has('month') && $request->month != '') {
            $query->where('bulan', $request->month);
        }

        // Get per_page value, default to 5
        $perPage = $request->get('per_page', 5);

        $salary = $query->latest()
            ->paginate($perPage)
            ->appends($request->query());

        return view('salaries.index', compact('salary', 'title'));
    }

    public function create()
    {
        $title = 'Salaries';
        $employees = \App\Models\Employee::with('position')->orderBy('nama_lengkap')->get();
        return view('salaries.create', compact('title', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        // Get employee with position to get basic salary
        $employee = \App\Models\Employee::with('position')->findOrFail($request->karyawan_id);
        
        if (!$employee->position) {
            return back()
                ->withErrors(['karyawan_id' => 'Karyawan belum memiliki jabatan.'])
                ->withInput();
        }

        $gajiPokok = $employee->position->gaji_pokok;
        $tunjangan = $request->tunjangan ?? 0;
        $potongan = $request->potongan ?? 0;
        $totalGaji = $gajiPokok + $tunjangan - $potongan;

        // Check if salary for this employee and month already exists
        $exists = Salary::where('karyawan_id', $request->karyawan_id)
            ->where('bulan', $request->bulan)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['bulan' => 'Gaji untuk karyawan ini pada bulan tersebut sudah tercatat.'])
                ->withInput();
        }

        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $totalGaji,
        ]);

        return redirect()
            ->route('salaries.index')
            ->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        $title = "Salaries";
        return view('salaries.show', compact('salary', 'title'));
    }

    public function edit(string $id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        $title = 'Salaries';
        return view('salaries.edit', compact('salary', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $salary = Salary::with('employee.position')->findOrFail($id);

        $request->validate([
            'bulan' => 'required|string|max:10',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $gajiPokok = $salary->employee->position->gaji_pokok;
        $tunjangan = $request->tunjangan ?? 0;
        $potongan = $request->potongan ?? 0;
        $totalGaji = $gajiPokok + $tunjangan - $potongan;

        $exists = Salary::where('karyawan_id', $salary->karyawan_id)
            ->where('bulan', $request->bulan)
            ->where('id', '!=', $id)
            ->exists();

        $salary->update([
            'bulan' => $request->bulan,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $totalGaji,
        ]);

        return redirect()
            ->route('salaries.index')
            ->with('success', 'Data gaji berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();
        return redirect()->route('salaries.index');
    }
}