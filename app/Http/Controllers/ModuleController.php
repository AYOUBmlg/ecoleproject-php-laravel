<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\module;
use App\Models\filiere;
use App\Models\utulisateur;

class ModuleController extends Controller
{
    public function index()
    {
        $listemodules = module::with('filiere', 'professeur')->paginate(5);
        return view('modules', compact('listemodules'));
    }

    public function create()
    {
        $filieres = filiere::all();
        $professeurs = utulisateur::where('role', 'professeur')->get();
        return view('create_module', compact('filieres', 'professeurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'filiere_id' => 'required|exists:filieres,id',
            'professeur_id' => 'required|exists:utulisateurs,id'
        ]);

        $module = new module();
        $module->nom = $request->input('nom');
        $module->description = $request->input('description');
        $module->filiere_id = $request->input('filiere_id');
        $module->professeur_id = $request->input('professeur_id');
        $module->save();

        return redirect()->route('module.index')->with('success', 'Module créé avec succès!');
    }

    public function editModule($id)
    {
        $selectedModule = module::findOrFail($id);
        $filieres = filiere::all();
        $professeurs = utulisateur::where('role', 'professeur')->get();
        return view('edit_module', compact('selectedModule', 'filieres', 'professeurs'));
    }

    public function updateModule(Request $request, $id)
    {
        $module = module::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'filiere_id' => 'required|exists:filieres,id',
            'professeur_id' => 'required|exists:utulisateurs,id'
        ]);

        $module->nom = $request->input('nom');
        $module->description = $request->input('description');
        $module->filiere_id = $request->input('filiere_id');
        $module->professeur_id = $request->input('professeur_id');
        $module->save();

        return redirect()->route('module.index')->with('success', 'Module mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $module = module::findOrFail($id);
        $module->delete();
        return redirect()->route('module.index')->with('success', 'Module supprimé avec succès!');
    }
}
