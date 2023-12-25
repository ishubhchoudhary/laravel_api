<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {

        $users = User::all();

        return response()->json([
            'message' => count($users) . ' Users found',
            'data' => $users,
            'status' => true
        ], 200);
    }

    public function show($id){

        $user = User::find($id);

        if($user != null){
            
            return response([
                'message' => 'Record found',
                'data' => $user,
                'status' => true
            ], 200);

        }else{

            return response([
                'message' => 'Record Not found',
                'data' => [],
                'status' => true
            ], 200);
        }

    }

    Public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if($validator->fails()){
            return response([
                'message' => 'Please fix the errors',
                'errors' => $validator->errors(),
                'status' => false
            ], 200);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->name;
        $user->save();

        return response([
                'message' => 'User added successfully',
                'data' => $user,
                'status' => true
            ], 200);

    }
}
