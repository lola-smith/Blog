<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    //table name 
   // protected $table='mapost';
  //  public $primarykey='asm-aycolom';
  //public $timestamps=fals;


 public function user(){
   return $this->belongsTo('App\User');
 }

 
public function comments(){
  return $this->hasMany('App\Comment');
}

public function tags(){

  return $this->belongsToMany('App\Tag');   
 }

}
