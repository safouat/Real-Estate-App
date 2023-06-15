<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class UploadImageController extends Controller
{
    public function index()
    {
        return view('annonces.image');
    }
 
    public function savePhoto(Request $request)
    {
        // Valider les données du formulaire de la photo
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si c'est la première connexion de l'utilisateur
        if ($user->first_login) {
            // Enregistrer la photo choisie par l'utilisateur
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $photoPath = $file->getClientOriginalName();
                $file->move(public_path('photos'), $photoPath); 
                $user->image = $photoPath;
                $user->first_login = false;
                $user->save();
            }

            // Rediriger l'utilisateur vers la page d'accueil ou toute autre page souhaitée
            return redirect()->route('annonces.index');
        } 
    }
    
}
