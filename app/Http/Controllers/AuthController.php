<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Resources\UserResource  as UserResource;
use App\Http\Requests\UpdateuserRequest;
use App\Http\Requests\StoreuserRequest;
use App\Models\user_information;
use App\Models\complete;
use App\Models\User;
use Validator;


class AuthController extends BaseController
{
    
    public function login(Request $request)
    {
        $users_id = $request->users_id;    
        $user = User::where('users_id', $users_id)->first();    
        if ($user) {    
            Auth::login($user);
            $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
            $success['user_name'] =  $user->user_name;
            return $this->handleResponse($success, 'User logged-in!');
        }
        else {    
            return $this->handleError('Unauthorised.', ['error'=>'Unauthorised']); 
        }    
    }
 
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'user_phone',
            'users_id' => 'required',
        ]);
    
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
    
        $input = $request->all();
        $user = User::create($input);
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
    
        return $this->handleResponse($success, 'User successfully registered!');
    }
    
    public function index()
    {
        $users = User::latest()->paginate(100);
     
        return view('users.index',compact('users'));
    }
    
    public function create()
    {
        return view('users.create');
    }


    public function store(StoreuserRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('users');
    }
    
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function show($users_id)
    {
        $info = User::find($users_id);
        if (is_null($info)) {
            return $this->handleError('not found!');
        }
        return $this->handleResponse(new UserResource($info), 'retrieved.');
    }
    
    public function updateUser(UpdateuserRequest $request, $users_id)
    {
        $user = User::find($users_id);
        $user->user_name = $request->user_name;
        $user->save();

        return redirect()->route('users');
    }

    public function update(Request $request, $users_id)
    {
        $input = $request->all();

        $info = User::find($users_id);

        if (is_null($info)) {
            return $this->handleError('not found!');
        }
 
        $validator = Validator::make($input, [
            'user_name' => 'required',
            'user_phone' => 'required',
            'users_id' => 'required', 
        ]);
 
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
 
        $info->user_name = $request->user_name;
        $info->user_phone = $request->user_phone;
        $info->users_id = $request->users_id;
        $info->save();

        return $this->handleResponse(new UserResource($info), 'successfully updated!');
    }

    public function destroy($users_id)
    {
        User::find($users_id)->delete();
        
        return $this->handleResponse([], 'deleted!');
    }
    
     public function remove($users_id)
    {
        User::find($users_id)->delete();
        
       return redirect()->route('users');
    }


}