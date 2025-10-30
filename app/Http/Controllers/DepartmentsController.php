<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentsController extends Controller
{
    public function index()
    {
        $title = 'Departments';
        $search = request()->query('search');
        $department = Department::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_department', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();
        return view('departments.index', compact('department', 'title'));
    }

    public function create()
    {
        $title = "Departments";
        return view('departments.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_department' => 'required|string|max:255',
        ]);
        Department::create($request->all());
        return redirect()->route('departments.index');
    }

    public function show(string $id)
    {
        $department = Department::find($id);
        $title = "Departments";
        return view('departments.show', compact('department', 'title'));
    }

    public function edit(string $id)
    {
        $department = Department::find($id);
        $title = 'Departments';
        return view('departments.edit', compact('department', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_department' => 'required|string|max:255',
        ]);
        $department = Department::findOrFail($id);
        $department->update($request->only([
            'nama_department'
        ]));
        return redirect()->route('departments.index');
    }

    public function destroy(string $id)
    {
        $deparment = Department::find($id);
        $deparment->delete();
        return redirect()->route('departments.index');
    }
}
