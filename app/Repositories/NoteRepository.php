<?php namespace App\Repositories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Model;




class NoteRepository  {


   public function findByTitle($title){

   return Note::where('title','=', $title)
            ->get();

    }

    public function getNote($id){

    return Note::where('id',$id)->first();

    }

    public function update(Note $note, array $attributes) {

    Note::where('id', '=', $note->id)->update($attributes);

    return Note::find($note->id);

    }

    public function create(array $attributes) {

    return Note::create($attributes);

    }

    public function all(){

    return Notet::all();

    }

    public function delete($id){

    return Note::find($id)->delete();

  }
}