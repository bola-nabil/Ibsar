<?php
namespace App\Http\Controllers;
 
use App\Models\Voice;
use Illuminate\Http\Request;
 
class VoiceController extends Controller
{
    public function index()
    {
        $voices = Voice::latest()->paginate(5);
     
        return view('voices.index',compact('voices'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('voices.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'book_voice' => 'required|mimes:mp3|',
        ]);
   
        $input = $request->all();
   
        if ($file = $request->file('book_voice')) {
            $filename = $file->getClientOriginalName();
            $location = 'books_voices/';
            $file->storeAs($location, $filename, 'my_files');
            $input['book_voice'] = url('public/uploads/books_voices/'.$filename);
        }
     
        Voice::create($input);
      
        return redirect()->route('voices');
    }
 
    //api
    public function searchName($name) {
        $results = Voice::where('name', 'LIKE', '%'. $name. '%')->get();
        return response()->json($results);
    }

    public function show(Voice $voice)
    {
  
        return view('voices.show',compact('voice'));
    }
 
    public function edit(Voice $voice)
    {
        return view('voices.edit',compact('voice'));
    }
 
    public function update(Request $request, Voice $voice)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
   
        $input = $request->all();
   
        if ($file = $request->file('book_voice')) {
            $filename = $file->getClientOriginalName();
            $location = 'books_voices/';
            $file->storeAs($location, $filename, 'my_files');
            $input['book_voice'] = url('public/uploads/books_voices/'.$filename);
        }else{
            unset($input['book_voice']);
        }
           
        $voice->update($input);
     
        return redirect()->route('voices');
    }
 
    public function destroy(Voice $voice)
    {
        $voice->delete();
        return redirect()->route('voices');
    }
}