<?php
namespace App\Http\Controllers;
 
use App\Models\category;
use Illuminate\Http\Request;
 
class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::latest()->paginate(100);
     
        return view('categories.index',compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('categories.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|'
        ]);
   
        $input = $request->all();
   
        if ($file = $request->file('category_image')) {
            $filename = $file->getClientOriginalName();
            $location = 'category_images/';
            $file->storeAs($location, $filename, 'my_files');
            $input['category_image'] = url('public/uploads/category_images/'.$filename);
        }

        category::create($input);
      
        return redirect()->route('categories');
    }
 
    //api
    public function findName() {
        $results = category::select('name','category_voice')->get();
        return response()->json($results);
    }

    public function searchName($name) {
        $results = category::where('name', 'LIKE', '%'. $name. '%')->get();
        return response()->json($results);
    }

    public function show(category $category)
    {
        return view('categories.show',compact('category'));
    }
 
    public function edit(category $category)
    {
        return view('categories.edit',compact('category'));
    }
 
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
   
        $input = $request->all();
   
        if ($file = $request->file('category_image')) {
            $filename = $file->getClientOriginalName();
            $location = 'category_images/';
            $file->storeAs($location, $filename, 'my_files');
            $input['category_image'] = url('public/uploads/category_images/'.$filename);
        }else{
            unset($input['category_image']);
        }

        $category->update($input);
     
        return redirect()->route('categories');
    }
 
    public function destroy(category $category)
    {
        $category->delete();
      
        return redirect()->route('categories');
    }
}