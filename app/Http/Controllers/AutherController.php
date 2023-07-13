<?php

namespace App\Http\Controllers;

use App\Models\auther;
use App\Http\Requests\StoreautherRequest;
use App\Http\Requests\UpdateautherRequest;

class AutherController extends Controller
{
    public function index()
    {
        $authors = auther::latest()->paginate(100);
     
        return view('auther.index',compact('authors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('auther.create');
    }

    public function store(StoreautherRequest $request)
    {
        auther::create($request->validated());

        return redirect()->route('authors');
    }

    public function edit(auther $auther)
    {
        return view('auther.edit', [
            'auther' => $auther
        ]);
    }

    public function update(UpdateautherRequest $request, $id)
    {
        $auther = auther::find($id);
        $auther->name = $request->name;
        $auther->save();

        return redirect()->route('authors');
    }

    public function destroy($id)
    {
        auther::findorfail($id)->delete();
        return redirect()->route('authors');
    }
}
