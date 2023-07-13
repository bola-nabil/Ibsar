<?php
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\userinformationResource  as userinformationResource;
use App\Http\Resources\ProfileResource  as ProfileResource;
use App\Http\Requests\Storeuser_informationRequest;
use App\Http\Requests\Updateuser_informationRequest;
use App\Models\user_information;
use App\Models\User;
use Validator;

class User_InformationController extends BaseController
{
 
    public function index()
    {
        $info = user_information::all();
        return $this->handleResponse(userinformationResource::collection($info), 'Done');
    }
 
     
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'users_id' => 'required',
            'user_favorites_books',
            'user_wish_books',
            'book_id',
            'stop_id',
        ]);
        
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        
        $info = user_information::create($input);

        return $this->handleResponse(new userinformationResource($info), 'created!');
    
    }
 
    
    public function show($users_id)
    {
        $info = user_information::find($users_id);
        if (is_null($info)) {
            return $this->handleError('not found!');
        }
        return $this->handleResponse(new userinformationResource($info), 'retrieved.');
    }

    public function display($users_id)
    {
        $info = user_information::find($users_id);
        if (is_null($info)) {
            return $this->handleError('not found!');
        }
        return $this->handleResponse(new ProfileResource($info), 'retrieved.');
    }

    public function update(Request $request, $users_id)
    {
        $input = $request->all();

        $info = user_information::find($users_id);

        if (is_null($info)) {
            return $this->handleError('not found!');
        }
 
        $validator = Validator::make($input, [
            'users_id' => 'required',
        ]);
 
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $info->users_id = $request->users_id;
        $info->user_favorites_books = $request->user_favorites_books;
        $info->user_wish_books = $request->user_wish_books;
        $info->book_id = $request->book_id;
        $info->stop_id = $request->stop_id;
        $info->save();
         
        return $this->handleResponse(new userinformationResource($info), 'successfully updated!');
    }
    
    public function destroy($users_id)
    {
        user_information::find($users_id)->delete();

        return $this->handleResponse([], 'deleted!');
    }
}