<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;

use Illuminate\Http\Request;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Illuminate\Http\RedirectResponse;

class NotesController extends Controller
{
    public function index()
    {
        $url = url('/notes');
        $title = "Create Note";
        $data = compact('url', 'title');
        return view('notes')->with($data);
    }


    public function store(StoreNoteRequest $request)
    {
        try{
            $data = $request->validated();

            $res = Note::create($data);

            return back();
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * To view all the notes of people
     */

    public function view(Request $request)
    {

        $notes = Note::all();        // change all()to this one for pagination =>paginate(5) //
        $data = compact('notes');
        return view('people-view')->with($data);
    }


    /**
     * To destroy the note
     */

    public function delete($id)
    {
        $note = Note::find($id);
        if (!is_null($note)) {
            $note->delete();
        }
        return redirect('people/view');
    }


    /**
     * slug controller
     */
    // public function getSlug()
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', request('title'));
    //     return response()->json(['slug' => $slug]);
    // }



    /**
     * Editor file handling
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */

    public function upload(Request $request)
    {
        $imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);
    }
}
