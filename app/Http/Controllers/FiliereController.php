<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filiere;

class FiliereController extends Controller
{
    public function index()
    {
        $listefilieres = filiere::paginate(5);
        return view('filieres', compact('listefilieres'));
    }

    public function create()
    {
        return view('create_filiere');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $filiere = new filiere();
        $filiere->nom = $request->input('nom');
        $filiere->description = $request->input('description');
        $filiere->save();

        return redirect()->route('filiere.index')->with('success', 'Filière créée avec succès!');
    }

    public function editFiliere($id)
    {
        $selectedFiliere = filiere::findOrFail($id);
        return view('edit_filiere', compact('selectedFiliere'));
    }

    public function updateFiliere(Request $request, $id)
    {
        $filiere = filiere::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $filiere->nom = $request->input('nom');
        $filiere->description = $request->input('description');
        $filiere->save();

        return redirect()->route('filiere.index')->with('success', 'Filière mise à jour avec succès!');
    }

    public function destroy($id)
    {
        $filiere = filiere::findOrFail($id);
        $filiere->delete();
        return redirect()->route('filiere.index')->with('success', 'Filière supprimée avec succès!');
    }
}
