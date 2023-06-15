<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;




class MachineLearningController extends Controller
{   
    public function index(){
        return view('incidents.prediction');
    }

public function predict(Request $request)
{
    // Récupération des données en POST
    $data = $request->all();

    // Envoi des données à l'API Flask avec le jeton CSRF inclus
    $response = Http::withHeaders([
            'X-CSRF-Token' => csrf_token()
        ])->post('http://127.0.0.1:5000/', $data);

    // Traitement de la réponse de l'API Flask
    $result = json_decode($response->body(), true);
    if ($result === null) {
        $errorMessage = "Erreur lors du décodage de la réponse JSON : " . json_last_error_msg();
        return response()->json(['error' => $errorMessage], 500);
    }
    
    // Renvoi de la réponse en GET
    return response()->json($result);
}

}