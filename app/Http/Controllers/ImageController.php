<?php
namespace App\Http\Controllers;
 
use App\Models\Image;
use Illuminate\Http\Request;
 
class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->paginate(100);
     
        return view('images.index',compact('images'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('images.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
   
        $input = $request->all();
   
        if ($file = $request->file('book_image')) {
               $filename = $file->getClientOriginalName();
               $location = 'books_images/';
               $file->storeAs($location, $filename, 'my_files');
               $input['book_image'] = url('public/uploads/books_images/'.$filename);
        }
     
        Image::create($input);
      
        return redirect()->route('images');
    }
 
    // api
    public function searchName($name) {
        $results = Image::where('name', 'LIKE', '%'. $name. '%')->get();
        return response()->json($results);
    }

    public function show(Image $image)
    {
  
        return view('images.show',compact('image'));
    }
 
    public function edit(Image $image)
    {
        return view('images.edit',compact('image'));
    }
 
    public function update(Request $request, Image $image)
    {

        $input = $request->all();
   
        if ($file = $request->file('book_image')) {
            $filename = $file->getClientOriginalName();
            $location = 'books_images/';
            $file->storeAs($location, $filename, 'my_files');
            $input['book_image'] = url('public/uploads/books_images/'.$filename);

        }else{
            unset($input['book_image']);
        }
           
        $image->update($input);
     
        return redirect()->route('images');
    }
 
    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('images');
    }
}