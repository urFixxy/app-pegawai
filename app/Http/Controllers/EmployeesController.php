<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;

class EmployeesController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Employees';
        $search = $request->query('search');
        $status = $request->query('status');
        $department = $request->query('department');
        $perPage = $request->query('per_page', 5);

        $employee = Employee::query()
            ->with(['department', 'position'])
            ->when($search, function ($query, $search) {
                return $query->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nomor_telepon', 'like', "%{$search}%");
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($department, function ($query, $department) {
                return $query->where('department_id', $department);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        $departments = Department::orderBy('nama_department')->get();
        $totalEmployees = Employee::count();
        $activeEmployees = Employee::where('status', 'Aktif')->count();

        return view('employees.index', compact(
            'employee',
            'title',
            'departments',
            'totalEmployees',
            'activeEmployees'
        ));
    }

    public function create()
    {
        $title = 'Employees';
        $departments = Department::orderBy('id')->get();
        $positions = Position::orderBy('id')->get();
        return view('employees.create', compact('title', 'departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
            'status' => 'required|string|max:50',
        ]);
        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        $title = "Employees";
        return view('employees.show', compact('employee', 'title'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $title = 'Employees';
        $departments = Department::orderBy('id')->get();
        $positions = Position::orderBy('id')->get();
        return view('employees.edit', compact('employee', 'title', 'departments', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
            'status' => 'required|string|max:50',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'department_id',
            'jabatan_id',
            'status',
        ]));
        return redirect()->route('employees.index');
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}