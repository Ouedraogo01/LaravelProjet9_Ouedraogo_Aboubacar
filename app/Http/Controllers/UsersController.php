<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Tuteur;

class UsersController extends Controller
{
    public function liste_etudiant()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.liste', compact('etudiants'));
    }

    public function ajouter_etudiant()
    {
        $etudiants = Etudiant::all();
        $tuteurs = Tuteur::all();

        return view('etudiant.ajouter', compact('etudiants', 'tuteurs'));
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
            'photo' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->tuteur_id = $request->tuteur_id;


        // Vérifiez si une image a été téléchargée
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images', 'public');
            $etudiant->photo = $imagePath;
        }


        $etudiant->save();

        return redirect('/etudiant')->with('status', 'L\'étudiant a bien été ajouté avec succes.');
    }

    public function update_etudiant($id)
    {
        $etudiants = Etudiant::find($id);
        $tuteurs = Tuteur::all();

        return view('etudiant.update', compact('etudiants', 'tuteurs'));
    }

    public function update_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);

        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->classe = $request->input('classe');
        $etudiant->tuteur_id = $request->input('tuteur_id');

        // Vérifiez si une image a été téléchargée
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images', 'public');
            $etudiant->photo = $imagePath;
        }

        $etudiant->update();

        return redirect('/etudiant')->with('status', 'L\'étudiant a bien été modifier avec succes.');

    }

    public function delete_etudiant($id)
    {
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
    }

    ///////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////

    public function liste_tuteur()
    {
        $tuteurs = Tuteur::all();
        return view('etudiant.tuteur', compact('tuteurs'));
    }

    public function ajouterTuteur_tuteur()
    {
        $tuteurs = Tuteur::all();

        return view('etudiant.ajouterTuteur', compact('tuteurs'));
    }

    public function ajouterTuteur_tuteur_traitement(Request $request)
    {
        $request->validate([
            'nom_prenom' => 'required',
        ]);

        $tuteur = new Tuteur();
        $tuteur->nom_prenom = $request->nom_prenom;

        $tuteur->save();

        return redirect('/tuteur')->with('status', 'Le tuteur a bien été ajouté avec succes.');
    }

    public function delete_tuteur($id)
    {
        $tuteur = Tuteur::find($id);
        $tuteur->delete();
    }
}