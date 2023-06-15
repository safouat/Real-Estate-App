<?php

namespace App\Models;
use App\Models\Photo;
use Illuminate\Notifications\DatabaseNotification;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    public $timestamps =false;
    protected $primaryKey = 'code';
    protected $fillable = ['code','name','surface','adresse','description', 'prix'];
    protected $table="annonces";
    public function photos()
    {
     return $this->hasMany(Photo::class, 'annonce_code');
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
public function RDVS()
{
    return $this->hasMany(rdv::class);
}
public function notifications()
{
    return $this->hasMany(DatabaseNotification::class);
}
public function COMMENTS()
{
    return $this->hasMany(Comment::class);
}
public function LIKES()
{
    return $this->hasMany(Like::class,'annonce_id');
}
public function coun($annonce){
    return $this->likes()->where('annonce_id', $annonce->code)->count();

}

}
