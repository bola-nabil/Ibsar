<?php

namespace App\Http\Controllers;

use App\Models\publisher;
use App\Http\Requests\StorepublisherRequest;
use App\Http\Requests\UpdatepublisherRequest;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = publisher::latest()->paginate(100);
     
        return view('publisher.index',compact('publishers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('publisher.create');
    }

    public function store(StorepublisherRequest $request)
    {
        publisher::create($request->validated());
        return redirect()->route('publishers');
    }

    public function edit(publisher $publisher)
    {
        return view('publisher.edit', [
            'publisher' => $publisher
        ]);
    }

    public function update(UpdatepublisherRequest $request, $id)
    {
        $publisher = publisher::find($id);
        $publisher->name = $request->name;
        $publisher->save();

        return redirect()->route('publishers');
    }

    public function destroy($id)
    {
        publisher::find($id)->delete();
        return redirect()->route('publishers');
    }
}
