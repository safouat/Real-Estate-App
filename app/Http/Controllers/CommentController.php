<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Photo;
use App\Models\User;
use App\Models\Comment;
use App\Http\Controllers\AnnonceController;
use App\Notifications\CommentNoti;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res=Comment::all();
        return view('annonces.show',compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($code)
    {
        return view('annonces.comment',compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $newcomment = new Comment();
    $newcomment->content = $request->input("comment");
    $newcomment->user_id = auth()->user()->id;
    $newcomment->name = auth()->user()->name;
    $newcomment->image = auth()->user()->image;
    $newcomment->annonce_id = $request->input("code");
    $code = $newcomment->annonce_id;
    $newcomment->save();
    $receiver = $newcomment->annonce_id;
    $d=Annonce::findorfail($receiver);
    $a=$d->name;
    $receiver=$d->user_id;
    

   /* $newnoti = new CommentNoti($newcomment->name, $newcomment->image, $a);

    auth()->user()->routeNotificationFor('database')->create([
        'type' => 'App\Notifications\CommentNoti',
        'annonce_code' => $newcomment->annonce_id,
        'read_at' => null,
        'data' => $newnoti->toArray($receiver),
    ]);*/

    return redirect()->route('annonces.show', ['code' => $code]);
}
public function SHOWComments()
{
    $user = Auth::user();
    $annonces = $user->annonces;

    $rdvNotifications = [];

    foreach ($annonces as $annonce) {
        $notifications = $annonce->notifications;

        foreach ($notifications as $notification) {
            if ($notification->type === 'App\Notifications\CommentNoti') {
                $a = $notification->data['commenter_name'];
                $b = $notification->data[ 'commenter_image'];
                $c= $notification->data[ 'annonce_name' ];
                if ($a != auth()->user()->name) {
                    $rdvNotifications[] = [
                        'commenter_name' => $a,
                        'commenter_image'=> $b,
                        'annonce_name' =>$c,
                    ];
                }
            }
        }
    }

    return view('annonces.NOTI', ['rdvNotifications' => $rdvNotifications]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function dest($id)
    {
        $comment = Comment::find($id);
        $c=$comment->annonce_id;

        if ($comment->user_id == auth()->user()->id) {
            $comment->delete();

            // You can also add a flash message to notify the user of successful deletion

            return redirect()->route('annonces.show', ['code' => $c]);
        }
    }
}
