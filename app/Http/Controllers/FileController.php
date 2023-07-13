<?php
namespace App\Http\Controllers;
 
use App\Models\File;
use Illuminate\Http\Request;
 
class FileController extends Controller
{
    public function index()
    {
        $files = File::latest()->paginate(100);
     
        return view('files.index',compact('files'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('files.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'book_file' => 'required|mimes:mp3|',
        ]);
   
        $input = $request->all();
   
        if ($file = $request->file('book_file')) {
            $filename = $file->getClientOriginalName();
            $location = 'books_files/';
            $file->storeAs($location, $filename, 'my_files');
            $input['book_file'] = url('public/uploads/books_files/'.$filename);
        }
     
        File::create($input);
        return redirect()->route('files');
    }

    //api
    public function searchName($name) {
        $results = File::where('name', 'LIKE', '%'. $name. '%')->get();
        return response()->json($results);
    }

    public function show(File $file)
    {
        return view('files.show',compact('file'));
    }
 
    public function edit(File $file)
    {
        return view('files.edit',compact('file'));
    }
 
    public function update(Request $request, File $file)
    {
        $request->validate([
            'name' => 'required',
        ]);
   
        $input = $request->all();
   
        if ($files = $request->file('book_file')) {
            $filename = $files->getClientOriginalName();
            $location = 'books_files/';
            $files->storeAs($location, $filename, 'my_files');
            $input['book_file'] = url('public/uploads/books_files/'.$filename);
        }else{
            unset($input['book_file']);
        }
           
        $file->update($input);
     
        return redirect()->route('files');
    }
 
    public function destroy(File $file)
    {
        $file->delete();
      
        return redirect()->route('files');
    }
}