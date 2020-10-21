<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

        protected $fillable = [
        'title',
        'body'
    ];



   public $timestamps = true;   
    
   protected $table = 'notes';


  public function user(){

   return $this->belongsTo(User::class); 

 }



}
