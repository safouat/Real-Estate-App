<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use  CanResetPassword;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'notifications',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'notifications' => 'array',
    ];
    public function annonces()
{
    return $this->hasMany(Annonce::class);
}
public function rdvs()
{
    return $this->hasMany(rdv::class);
}
public function COMMENTS()
{
    return $this->hasMany(Comment::class);
}
public function likes()
{
    return $this->hasMany(Like::class);
}
public function hasLiked($annonce)
{
    return $this->likes()->where('annonce_id', $annonce->code)->exists();
}
 
public function like($annonce)
{
    $this->likes()->create([
        'annonce_id' => $annonce->code,
        'user_id' => auth()->user()->id
    ]);
   
}

public function unlike($annonce)
{
    $this->likes()->where('annonce_id', $annonce->code)->delete();
    
}




}
