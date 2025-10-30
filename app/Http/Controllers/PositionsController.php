<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionsController extends Controller
{
    public function index()
    {
        $title = 'Positions';
        $search = request()->query('search');
        $position = Position::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_jabatan', 'like', "%{$search}%")
                    ->orWhere('gaji_pokok', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return view('positions.index', compact('position', 'title'));
    }

    public function create()
    {
        $title = 'Positions';
        return view('positions.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);
        Position::create($request->all());
        return redirect()->route('positions.index');
    }

    public function show(string $id)
    {
        $position = Position::find($id);
        $title = "Positions";
        return view('positions.show', compact('position', 'title'));
    }

    public function edit(string $id)
    {
        $position = Position::find($id);
        $title = 'Positions';
        return view('positions.edit', compact('position', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->only([
            'nama_jabatan',
            'gaji_pokok',
        ]));
        return redirect()->route('positions.index');
    }

    public function destroy(string $id)
    {
        $position = Position::find($id);
        $position->delete();
        return redirect()->route('positions.index');
    }
}
