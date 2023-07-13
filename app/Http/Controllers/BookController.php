<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\auther;
use App\Models\category;
use App\Models\publisher;
use App\Models\Image;
use App\Models\File;
use App\Http\Resources\BookResource;


class BookController extends Controller
{
    public function index()
    {

        $books = book::latest()->paginate(20);
     
        return view('book.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
            'images' => Image::latest()->get(),
            'files' => File::latest()->get(),
        ]);
    }

    public function store(StorebookRequest $request)
    {
        book::create($request->validated());
        return redirect()->route('books');
    }
    

    // api
    public function findName() {
        $find_name = Book::select('name')->get();
        return response()->json($find_name);
    }

    public function searchName($name) {
        
        $books = book::where('name', 'LIKE', '%'. $name. '%')->select('id', 'name')->get();

        $book_auther = book::where('name', 'LIKE', '%'. $name. '%')->value('auther_id');
        $auther = auther::where('id', 'LIKE', '%'. $book_auther. '%')->get();

        $book_publisher = book::where('name', 'LIKE', '%'. $name. '%')->value('publisher_id');
        $publisher = publisher::where('id', 'LIKE', '%'. $book_publisher. '%')->get();

        $book_category = book::where('name', 'LIKE', '%'. $name. '%')->value('category_id');
        $category = category::where('id', 'LIKE', '%'. $book_category. '%')->get();

        $book_image = book::where('name', 'LIKE', '%'. $name. '%')->value('image_id');
        $image = Image::where('id', 'LIKE', '%'. $book_image. '%')->get();

        $book_file = book::where('name', 'LIKE', '%'. $name. '%')->value('file_id');
        $file = File::where('id', 'LIKE', '%'. $book_file. '%')->get();

        return response()->json([
            'book' => $books,
            'search_words' => $auther,
            'publisher' => $publisher,
            'category' => $category,
            'Image' => $image,
            'File' => $file,
        ]);
    }

    public function edit(book $book)
    {
        return view('book.edit',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
            'images' => Image::latest()->get(),
            'files' => File::latest()->get(),
            'book' => $book
        ]);
    }

    public function update(UpdatebookRequest $request, $id)
    {
        $book = book::find($id);
        $book->name = $request->name;
        $book->auther_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->image_id = $request->image_id;
        $book->file_id = $request->file_id;
        $book->save();
        return redirect()->route('books');
    }
    
    public function destroy($id)
    {
        book::find($id)->delete();
        return redirect()->route('books');
    }
}