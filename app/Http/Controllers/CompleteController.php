<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\CompleteResource  as CompleteResource;
use App\Http\Requests\StorecompleteRequest;
use App\Http\Requests\UpdatecompleteRequest;
use App\Models\complete;
use App\Models\User;
use Validator;

class CompleteController extends BaseController
{
    public function index()
    {
        $info = complete::all();
        return $this->handleResponse(CompleteResource::collection($info), 'Done');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'book_id' => 'required',
            'stop_id' => 'required',
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $info = complete::create($input);
        return $this->handleResponse(new CompleteResource($info), 'created!');

    }

    public function show($user_id)
    {
        $info = complete::find($user_id);
        if (is_null($info)) {
            return $this->handleError('not found!');
        }
        return $this->handleResponse(new CompleteResource($info), 'retrieved.');
    }

    public function update(Requeset $request, $user_id)
    {
        $info = complete::find($user_id);
        $input = $request->all();
 
        $validator = Validator::make($input, [
            'user_favorites_books' => 'required',
            'user_wish_books' => 'required'
        ]);
 
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
 
        $info->book_id = $input['book_id'];
        $info->stop_id = $input['stop_id'];
        $info->save();
    
        return $this->handleResponse(new CompleteResource($info), 'successfully updated!');

    }

    public function destroy($user_id)
    {
        complete::find($user_id)->delete();

        return $this->handleResponse([], 'deleted!');
    }
}
