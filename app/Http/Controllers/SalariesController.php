<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SalariesController extends Controller
{
    public function index()
    {
        $salary = Salary::latest()->paginate(5);
        $title = 'Salaries';
        return view('salaries.index', compact('salary', 'title'));
    }

    public function create()
    {
        $title = 'Salaries';
        return view('salaries.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
            'total_gaji' => 'required|numeric',
        ]);
        Salary::create($request->all());
        return redirect()->route('salaries.index');
    }

    public function show(string $id)
    {
        $salary = Salary::find($id);
        $title = "Salaries";
        return view('salaries.show', compact('salary', 'title'));
    }

    public function edit(string $id)
    {
        $salary = Salary::find($id);
        $title = 'Salaries';
        return view('salaries.edit', compact('salary', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
            'total_gaji' => 'required|numeric',
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update($request->only([
            'karyawan_id',
            'bulan',
            'gaji_pokok',
            'tunjangan',
            'potongan',
            'total_gaji',
        ]));
        return redirect()->route('salaries.index');
    }

    public function destroy(string $id)
    {
        $salary = Salary::find($id);
        $salary->delete();
        return redirect()->route('salaries.index');
    }
}