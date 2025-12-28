<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cour;
use App\Models\module;
use App\Models\filiere;
use App\Models\utulisateur;

class CourController extends Controller
{
    public function index()
    {
        $listecours = cour::with('filiere', 'module', 'professeur')->paginate(5);
        return view('cours', compact('listecours'));
    }

    public function create()
    {
        $modules = module::all();
        $filieres = filiere::all();
        $professeurs = utulisateur::where('role', 'professeur')->get();
        return view('create_cour', compact('modules', 'filieres', 'professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:Cours,TD,TP',
            'fichier' => 'required|string',
            'module_id' => 'required|exists:modules,id',
            'filiere_id' => 'required|exists:filieres,id',
            'professeur_id' => 'required|exists:utulisateurs,id'
        ]);

        $cour = new cour();
        $cour->titre = $request->input('titre');
        $cour->description = $request->input('description');
        $cour->type = $request->input('type');
        $cour->fichier = $request->input('fichier');
        $cour->module_id = $request->input('module_id');
        $cour->filiere_id = $request->input('filiere_id');
        $cour->professeur_id = $request->input('professeur_id');
        $cour->save();

        return redirect()->route('cour.index')->with('success', 'Cours créé avec succès!');
    }

    public function editCour($id)
    {
        $selectedCour = cour::findOrFail($id);
        $modules = module::all();
        $filieres = filiere::all();
        $professeurs = utulisateur::where('role', 'professeur')->get();
        return view('edit_cour', compact('selectedCour', 'modules', 'filieres', 'professeurs'));
    }

    public function updateCour(Request $request, $id)
    {
        $cour = cour::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:Cours,TD,TP',
            'fichier' => 'required|string',
            'module_id' => 'required|exists:modules,id',
            'filiere_id' => 'required|exists:filieres,id',
            'professeur_id' => 'required|exists:utulisateurs,id'
        ]);

        $cour->titre = $request->input('titre');
        $cour->description = $request->input('description');
        $cour->type = $request->input('type');
        $cour->fichier = $request->input('fichier');
        $cour->module_id = $request->input('module_id');
        $cour->filiere_id = $request->input('filiere_id');
        $cour->professeur_id = $request->input('professeur_id');
        $cour->save();

        return redirect()->route('cour.index')->with('success', 'Cours mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $cour = cour::findOrFail($id);
        $cour->delete();
        return redirect()->route('cour.index')->with('success', 'Cours supprimé avec succès!');
    }

    public function coursDisponibles()
    {
        $cours = cour::with('module', 'filiere', 'professeur')->get();
        return view('cours_disponibles', compact('cours'));
    }
}
