<?php

namespace App\Http\Controllers;

use App\Mail\REFUSMAIL;
use App\Mail\TESTMAIL;
use App\Models\Annonce;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\RDV;
use App\Models\User;
use App\Models\visiter;
use App\Notifications\PostRDV;
use Carbon\Carbon;
use Dompdf\Dompdf;
use extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultat = Annonce::paginate(10);
         // 10 est le nombre d'éléments par page

        $images = [];

        foreach ($resultat as $r) {
            $photo = $r->photos()->first();
            $images[] = $photo->image;
        }

        return view("annonces.index", [
            "allo" => $resultat,
            "images" => $images,
        ]);
    }

    public function sho()
    {
        $resultat = Annonce::all();
       
        return view("annonces.sho", ["safouat" => $resultat]);

    }
    public function sho1()
    {
        $resultat = Annonce::paginate(10);

        return view("annonces.sho1", ["safouat" => $resultat]);

    }
    public function qwerty()
    {
        $userCount = User::count();
        $annonceCount = Annonce::count();
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();

// Comptez les enregistrements dans la plage de dates
        $count = RDV::whereBetween('created_at', [$weekStart, $weekEnd])->count();
        $visitcount = visiter::count();
        $results = RDV::selectRaw('DATE(created_at) AS day')
            ->whereBetween('created_at', [$weekStart, $weekEnd])
            ->groupBy('day')
            ->get()
            ->mapWithKeys(function ($item) {
                $count = RDV::whereDate('created_at', $item->day)->count();
                return [$item->day => $count];
            })->values();
        $resultats = visiter::selectRaw('DATE(created_at) AS day')
            ->whereBetween('created_at', [$weekStart, $weekEnd])
            ->groupBy('day')
            ->get()
            ->mapWithKeys(function ($item) {
                $count = visiter::whereDate('created_at', $item->day)->count();
                return [$item->day => $count];
            })->values();
            $a = [];
            $b = [];
        $annonces = Annonce::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->get(['surface', 'prix']);
        foreach ($annonces as $an) {
            $a[] = $an['surface'];
            $b[] = $an['prix'];
        }
        $users = User::selectRaw('admin, COUNT(*) as count')
            ->groupBy('admin')
            ->get();

        foreach ($users as $user) {
            if ($user->admin == 1) {
                // Nombre d'administrateurs
                $countAdmins = $user->count;
            } else {
                // Nombre d'utilisateurs simples
                $countUsers = $user->count;
            }
        }

        return view('annonces.qwerty', compact('userCount'), compact('annonceCount', 'count', 'visitcount', 'results', 'resultats', 'a', 'b', 'countAdmins', 'countUsers'));
    }
   
    public function user()
    {
        $resultat = Annonce::all();
        return view("annonces.user", ["allo" => $resultat]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("annonces.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //$newannonce=annonce::create([
        // 'name' => $request->input("name"),
        // 'description' => $request->input("description"),
        // 'prix' => $request->input("prix"),
        // 'adresse' => $request->input("adresse"),
        // 'surface' => $request->input("surface"),
        // 'date de publication' =>$request->input("date_de_publication"),
        // 'user_id'=>auth()->user()->id
        //  ]);
        $newannonce = new Annonce();
        $newannonce->name = $request->input("name");
        $newannonce->description = $request->input("description");
        $newannonce->prix = $request->input("prix");
        $newannonce->adresse = $request->input("adresse");
        $newannonce->surface = $request->input("surface");
        $newannonce->date_de_publication = $request->input("date_de_publication");
        $newannonce->user_id = auth()->user()->id;
        $newannonce->save();

        if ($request->has('photos')) {

            foreach ($request->file('photos') as $image) {
                $imageName = time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('photos'), $imageName);
                echo $imageName;
                Photo::create([
                    'annonce_code' => $newannonce->code,
                    'name' => $newannonce->name,
                    'image' => $imageName,
                ]);
            }
        }
        // $imageName = time().'.'.$request->image->extension();
        // $request->file('image')->move(public_path('/photos'), $imageName);
        return redirect('profile');

    }

    /**
     * Display the specified resource.
     */

    public function show($code)
    {

        $resultat = Annonce::findorfail($code);
       
        $r=$resultat->user_id;
        $user=User::findorfail($r);
       
        $images = $resultat->photos()->get();
        $res = Comment::join('annonces', 'comments.annonce_id', '=', 'annonces.code')
        ->where('annonces.code', $code)
        ->select('comments.*')
        ->get();
        $count = $resultat->coun($resultat);
        
       


        return view('annonces.show', compact('resultat', 'images','user','res','count'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code)
    {
        $annonce = Annonce::findorfail($code);
        if ($annonce->user_id == auth()->user()->id) {
            return view('annonces.update', compact('annonce'));}
    }
    public function update(Request $request, $code)
    {
        $annonce = Annonce::findorfail($code);
        if ($annonce->user_id == auth()->user()->id) {
            $annonce->name = $request->input("name");
            $annonce->description = $request->input("description");
            $annonce->adresse = $request->input("adresse");
            $annonce->surface = $request->input("surface");
            $annonce->prix = $request->input("prix");

            $annonce->save();
            return redirect('profile');}

    }
    public function destroy($code)
    {
        $annonce = Annonce::find($code);

        if ($annonce->user_id == auth()->user()->id) {
            $annonce->delete();

            // You can also add a flash message to notify the user of successful deletion

            return redirect()->route('profile');
        }
    }
    public function search(Request $request)
    {
        $search = $request->input('query');

        $resultat = Annonce::where('name', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->get();
        return view("annonces.search", compact('resultat'));

    }

    public function generatePdf($code)
    {
        $resultat = Annonce::findorfail($code);
        $images = $resultat->photos()->get();

        $pdfOptions = [
            'isRemoteEnabled' => true,
        ];

        $pdf = new Dompdf($pdfOptions);
        $pdf->loadHtml(View::make('annonces\pdf', compact('resultat', 'images'))->render());
        $pdf->render();

        $filename = 'resultat_' . $code . '.pdf';
        $pdf->stream($filename, ['Attachment' => false]);
    }

    public function RDV($code)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $newRDV = new RDV();
            $newRDV->annonce_code = $code;
            $newRDV->user_id = $user->id;
            $newRDV->save();

            $annonce = Annonce::findOrFail($code);
            $newnoti = new PostRDV($user, $annonce, $annonce->user, $code);

            $user->routeNotificationFor('database')->create([
                'type' => 'App\Notifications\PostRDV',
                'annonce_code' => $code,
                'read_at' => null,
                'data' => $newnoti->toArray($user),
            ]);

            Session::flash('success', 'Vous avez pris le rendez vous.');

            // Retourner à la page précédente
            return back();
        }
    }
    public function like($code)
    {
        $annonce=Annonce::findorfail($code);
        $user=Auth::user();
        
        if($user->hasLiked($annonce)){
            $user->unlike($annonce);
            $bol=false;
        }
        else{
            $user->like($annonce);
            $bol=true;
        }
        $count = $annonce->coun($annonce);
       
        return response()->json([
                'liked' => $bol,
                'count'=>$count

               
            ]);
        
    }
    public function countlike($code)
    {
        $count = $annonce->coun($annonce);
        return view('incidents.show',compact('count'));
        
    }
        

//Assurez-vous également que les modèles et les notifications sont bien importés dans votre fichier de contrôleur.

public function SHOWRDV()
{
    $user = Auth::user();
    $annonces = $user->annonces;

    $rdvNotifications = [];

    foreach ($annonces as $annonce) {
        $notifications = $annonce->notifications;
   
        

        foreach ($notifications as $notification) {
            $likerName = $notification->data['liker_name'];
            $postTitle = $notification->data['post_title'];
            $createdat=$notification['created_at'];

            if ($likerName != auth()->user()->name) {
                $rdvNotifications[] = [
                    'likerName' => $likerName,
                    'postTitle' => $postTitle,
                    'createdat'=> $createdat,
                ];
            }
        }
    }
   
    

    return view('annonces.NOTIFICATION', ['rdvNotifications' => $rdvNotifications]);
}

    public function Accord($index)
    {
        $user = Auth::user();
        $annonces = $user->annonces;
        $email = [];
        
        foreach ($annonces as $annonce) {
            $notifications = $annonce->notifications;
          
            foreach($notifications as $notification){
                $email[]=$notification->data['liker_adress'];
                
            }
           
        }
        
        Mail::to($email[$index])->send(new TESTMAIL());
        return response('sending');
    }
    
    public function Refus($index)
    {
        $user = Auth::user();
        $annonces = $user->annonces;
        $email = [];
        
        foreach ($annonces as $annonce) {
            $notifications = $annonce->notifications;
            $filteredNotifications = $notifications->where('type', 'App\Notifications\PostRDV');
            dd( $filteredNotifications);
            
            $filteredEmails = $filteredNotifications->pluck('data.liker_adress');
            $email = array_merge($email, $filteredEmails->toArray());
            dd($email);
        }
    
        Mail::to($email[$index])->send(new REFUSMAIL());
        return response('sending');

    }

}
