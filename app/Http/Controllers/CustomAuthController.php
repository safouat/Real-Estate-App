<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class CustomAuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->first_login==1) {
                // Redirigez l'utilisateur vers la page de choix de la photo
                return redirect('upload-image');
            }
            
            // Redirigez l'utilisateur vers la page d'accueil (index)
            else return redirect('index');
        }
        
        else return view("annonces.login");
    }
    public function customLogin(Request $request)
    {
        // Vérifier que l'utilisateur n'est pas déjà connecté
        
    
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // Utiliser des constantes pour les noms de champs
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->first_login==1) {
                // Redirigez l'utilisateur vers la page de choix de la photo
                return redirect('upload-image');
            }
            
            // Redirigez l'utilisateur vers la page d'accueil (index)
            else return redirect('index');
        }
    
        // Éviter de renvoyer des messages d'erreur détaillés
        return redirect("login");
    }
    
  

    
    public function registration()
    {
        return view('annonces.register');
    }
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->only('name','email');

        $user = new User([
            'name'=>$request->input('name'),'email'=>$request->input('email'),
            'password'=>Hash::make($request->password)
        ]);
        $user->save();

         
        Session::flash('success', 'Vous etes bien enregistrer.');

        // Retourner à la page précédente
        return back();
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }


}
