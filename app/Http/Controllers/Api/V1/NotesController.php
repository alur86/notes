<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\PostUpdatedRequest;
use App\Http\Requests\PostAddRequest;
use Carbon\Carbon;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Note::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostAddRequest $request)
    {
       $note = new Note();
       $note->title = $request->get('title');
       $note->body = $request->get('body');
       $note->user_id = intval($request->get('user_id'));
       $note->created_at = Carbon::now();
       $note->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $note = Note::findOrFail($id);
      return response()->json($note);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $note = Note::findOrFail($id);
      return response()->json($note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdatedRequest $request, $id)
    {
        $note = Note::find($id);
        $note->update($request->all());
 
        return response()->json('The note successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return response()->json('The note successfully deleted');
    }
}
