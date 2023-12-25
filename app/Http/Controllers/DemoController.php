<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index() {
        $array = [
            [
                'name' => 'Shubham choudhary',
                'email' => 'shubham@gmail.com'
            ],
            [
                'name' => 'Sanjay choudhary',
                'email' => 'sanjay@gmail.com'
            ],
            [
                'name' => 'Nayara choudhary',
                'email' => 'nayara@gmail.com'
            ]
        ];

        return response()->json([
            'message' => '2 Users found',
            'data' => $array,
            'status' => true
        ], 200);
    }
}
