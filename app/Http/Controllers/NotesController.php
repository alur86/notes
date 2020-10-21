<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Note;
use App\Repositories\NoteRepository;
use App\Http\Requests\PostUpdatedRequest;
use App\Http\Requests\PostAddRequest;

class StudentsController extends Controller
{
    
   
    protected $noteRepository;


  
    public function __construct(NoteRepositoryy $noteRepository
                               ){
        $this->noteRepository = $noteRepository;
       
    }


     public function index() {
       
     $notes = $this->noteRepository->all();

     return view('notes.index',compact('notes'));

    } 


    public function new() {

    return view('notes.new');

    }

    public function create(PostAddRequest $request) {

    $attributes =([ 
		    'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => intval($request->get('user_id'))
        ]);


    $note = $this->noteRepository->create($attributes);

    return redirect(route('notes'))->with('success', 'New note was created');


    }

  

    public function edit($id) {

    $note = $this->noteRepository->getNote($id);

    return view('notes.edit',compact('student'));

    }



    public function update(PostUpdatedRequest $request) {
    
     $note_id = intval($request->get('note_id'));
     $note = Note::where( 'id', '=', $note_id )->first();

      $attributes =([ 
		    'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => intval($request->get('user_id'))
        ]);

    $note = $this->noteRepository->update($note,$attributes);

    return redirect(route('notes'))->with('success', 'Note was updated ok');


    }



    public function delete($id) {
  
    $note = $this->noteRepository->delete($id);

    return redirect(route('notes'))->with('success', 'Note was deleted');

    }

}




