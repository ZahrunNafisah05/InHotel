<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:'
        ]);
         $user = User::create([
                  'name' => $fields['name'],
                  'email' => $fields['email'],
                  'password' => bcrypt($fields['password'])
            ]);
            $token = $user->createToken('tokenku')->plainTextToken;

            $respons = [
                  'user' => $user,
                  'token' => $token
            ];

            return response($respons, 201);
    }
    public function login(Request $request)
    {
            $fields = $request->validate([
                  'email' => 'required|string',
                  'password' => 'required|string'
            ]);

            //Check email
            $user = User::where('email', $fields['email'])->first();

            //Check password
            if (!$user || !Hash::check($fields['password'], $user->password)) {
                  return response([
                        'message' => 'unauthorized'
                  ], 401);
            }

            $token = $user->createToken('tokenku')->plainTextToken;

            $response = [
                  'user' => $user,
                  'token' => $token
            ];

            return response($response, 201);
      }

      public function logout(Request $request)
      {
            $request->user()->currentAccessToken()->delete();

            return [
                  'message' => 'Logged out'
            ];
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function alluser()
    {
        $user = User::all();
        if($user) {
            return response()->json([
                'status' => 200,
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' =>404,
                'message' => 'Belum terdapat user'
            ], 404);
        }
    }

    public function showuser ($id){
        $user = User::find($id);
        if($user) {
            return response()->json([
                'status' => 200,
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'status' =>404,
                'message' => 'id atas ' . $id .'tidak ditemukan'
            ], 404);
        }
    }
}
