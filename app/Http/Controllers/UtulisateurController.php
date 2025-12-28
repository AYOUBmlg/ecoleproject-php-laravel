<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utulisateur;
use App\Models\filiere;
use Illuminate\Support\Facades\Hash;

class UtulisateurController extends Controller
{
   public function index()
   {
       $listeutulisateurs = utulisateur::with('filiere')->paginate(5);
       return view('utulisateurs',compact('listeutulisateurs'));
   }
    public function editUtulisateur(Request $request)
    {
     $id = $request->id;
     $selectedUtulisateur = utulisateur::find($id);
     $filieres = filiere::all();
     return view('ShowUtulisateur', compact('selectedUtulisateur', 'filieres'));
    }

    public function updateUtulisateur(Request $request)
    {
     $id = $request->id;
     $utulisateur = utulisateur::find($id);

     $utulisateur->name = $request->input('name');
     $utulisateur->email = $request->input('email');
     $utulisateur->role = $request->input('role');
     $utulisateur->filiere_id = $request->input('filiere_id');

     $utulisateur->save();

     return redirect('/utulisateur');
     
    }

    public function destroy(Request $request)
    {
     $id = $request->id;
     $utulisateur = utulisateur::find($id);
     $utulisateur->delete();
     return redirect('/utulisateur');
    }
    public function create()
    {
        $filieres = filiere::all();
        return view('create', compact('filieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:utulisateurs,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,professeur,etudiant',
            'filiere_id' => 'nullable|exists:filieres,id'
        ]);

        $utulisateur = new utulisateur();
        $utulisateur->name = $request->input('name');
        $utulisateur->email = $request->input('email');
        $utulisateur->password = Hash::make($request->input('password'));
        $utulisateur->role = $request->input('role');
        $utulisateur->filiere_id = $request->input('filiere_id');
        $utulisateur->save();

        return redirect()->route('utulisateur.index')->with('success', 'Utilisateur créé avec succès!');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $utulisateur = utulisateur::where('email', $request->email)->first();

        if ($utulisateur && Hash::check($request->password, $utulisateur->password)) {
            // Login successful - redirect by role
            if ($utulisateur->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($utulisateur->role == 'professeur') {
                return redirect()->route('professeur.dashboard');
            } else {
                return redirect()->route('etudiant.dashboard');
            }
        }

        return back()->with('errorMessage', 'Email ou mot de passe incorrect.');
    }

}
