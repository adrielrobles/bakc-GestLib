<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentRequest;
use App\Models\LibrarySection;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::all();
        return view('rents.index', compact('rents'));
    }

    public function create()
    {
        return view('rents.create');
    }

    public function store(RentRequest $request)
    {
        try {
            $rent = Rent::create($request->all());
            $librarySection = LibrarySection::find($request->input('library_section_id'));
            $librarySection->decrement('available_copies');
            return response()->json(['message' => 'Renta creada con éxito', 'rent' => $rent], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la renta', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Rent $rent)
    {
        return view('rents.show', compact('rent'));
    }

    public function edit(Rent $rent)
    {
        return view('rents.edit', compact('rent'));
    }

    public function update(Request $request, Rent $rent)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            // Otras validaciones y campos necesarios
        ]);

        $rent->update($request->all());

        return redirect()->route('rents.index')->with('success', 'Renta actualizada con éxito');
    }

    public function destroy(Rent $rent)
    {
        $rent->delete();

        return redirect()->route('rents.index')->with('success', 'Renta eliminada con éxito');
    }
}
