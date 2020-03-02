<?php

namespace App\Http\Controllers;

use App\ModelAccount;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $data = ModelAccount::all();
        return response($data);
    }

    public function store(Request $request)
    {
        $data = new ModelAccount();
        $data->nama = $request->input('nama');
        $data->alamat = $request->input('alamat');
        $data->telepon = $request->input('telepon');
        $data->email = $request->input('email');
        $data->telepon = $request->input('telepon');
        $data->username = $request->input('username');
        $data->password = $request->input('password');
        $data->created_at = $request->input('created_at');
        $data->updated_at = $request->input('updated_at');
        $data->save();

        return response('Registration successful');
    }

    public function profile(Request $request, $id)
    {
        $data = ModelAccount::where('id', $id)->first();
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $email = $request->input('email');
        $telepon = $request->input('telepon');
        $username = $request->input('username');
        $password = $request->input('password');
        $created_at = $request->input('created_at');
        $updated_at = $request->input('updated_at');
 
        $post = ModelAccount::find($id);

        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ];
 
        $update = $post->update($data);

        if ($update) {
            $out  = [
                "message" => "Profile Updated",
                "results" => $data,
                "code"  => 200
            ];
        } else {
            $out  = [
                "message" => "Failed Update Data",
                "results" => $data,
                "code"   => 404,
            ];
        }

        return response()->json($out, $out['code']);
    }

    public function password(Request $request, $id)
    {
        $password = $request->input('password');
        $updated_at = $request->input('updated_at');
 
        $post = ModelAccount::find($id);

        $data = [
            'password' => $password,
            'updated_at' => $updated_at
        ];
 
        $update = $post->update($data);

        if ($update) {
            $out  = [
                "message" => "Password Updated",
                "results" => $data,
                "code"  => 200
            ];
        } else {
            $out  = [
                "message" => "Failed Update Password",
                "results" => $data,
                "code"   => 404,
            ];
        }

        return response()->json($out, $out['code']);
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
 
        

        $dataReq = [
            'password' => $password,
            'username' => $username
        ];

        $data = ModelAccount::where('password', '=', $password)
                ->where('username', '=', $username)->first();
 

        if ($data) {
            $out  = [
                "message" => "Login successful",
                "results" => $dataReq,
                "code"  => 200
            ];
        } else {
            $out  = [
                "message" => "Login Failed",
                "results" => $dataReq,
                "code"   => 404,
            ];
        }

        return response()->json($out, $out['code']);
    }

    //
}
