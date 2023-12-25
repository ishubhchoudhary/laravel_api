<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
