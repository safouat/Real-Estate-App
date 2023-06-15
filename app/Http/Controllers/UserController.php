<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordLink;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{ 
    public function users()
    {
        $resultat=User::paginate(12);
        return view('annonces.users',compact('resultat'));
    }
    public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $resultat=Annonce::where('user_id', auth()->user()->id)->get();
            return view('annonces.sho', ['user' => $user],["safouat"=>$resultat]);
        } else {
            return redirect()->route('login');
        }
    }
    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('annonces.forget', ['user' => $user]);
        } else {
            return redirect()->route('login');
        }
    }
    public function update(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->name = $request->input("name");
            $user->email = $request->input("email");
   
        $user->save();
        Session::flash('success', 'Les informations ont été modifiées avec succès.');

        // Retourner à la page précédente
        return back();
        } else {
            return redirect()->route('login');
        }
    }
    public function showChangePasswordForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('annonces.forget', ['user' => $user]);
    }
}
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();
        $current_password = $user->password;

        if (Hash::check($request->current_password, $current_password)) {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            Session::flash('success', 'Les informations ont été modifiées avec succès.');

            // Retourner à la page précédente
            return back();
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Le mot de passe actuel ne correspond pas !']);
        }
    }
  
    
}