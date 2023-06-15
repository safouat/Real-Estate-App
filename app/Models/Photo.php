<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=['annonce_code','name','image'];
    protected $table="photos";
    public function annonce()
{
  return $this->belongsTo(Annonce::class);
}
}
