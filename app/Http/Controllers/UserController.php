<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Role;

// use Auth;




class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('trashce')->accessToken;
            $role = $user->getRoleNames();
            ;

            return response()->json([
                'status' => 'success',
                // 'user' => $user,
                'token' => $token,
                'role' => $role
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }
    }
    public function userRole($role)
    {
        $roles = Role::where('name', $role)->get();
        $users = User::role($role)->get();
        if (!$roles) {
            return response()->json(["error" => "There is no role with name " . $role], 404);
        }
        return response()->json(["user" => $users], 200);
    }

    public function regisUser(Request $request)
    {
        $input['nik_user'] = $request->nik_user;
        $input['full_name'] = $request->full_name;
        $input['email'] = $request->email;
        $input['phone_number'] = $request->phone_number;
        $input['address'] = $request->address;
        $input['password'] = $request->password;
        $input['role'] = $request->role;
        
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if ($input['role'] == 'admin') {
            $user->assignRole('admin');
        }
        if ($input['role'] == 'user') {
            $user->assignRole('user');
        }

        $success['full_name'] = $user->full_name;
        $success['role'] = $user->getRoleNames();
        return response()->json(['success' => $success], 200);

    }
    public function userId($id) {
        if (User::where('id', $id)->exists()) {
            return response()->json(["user" => User::where('id', $id)->get()], 200);
            // return response()->json(User::where('id', $id)->with('data.makanan', 'data.minuman')->get(), 200);
        } else {
            return response()->json(["error" => "ID Not Found In Users !"], 404);
        }
    }
    public function detailUser()
    {
        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();
            $id = $user['id'];

            $user['role'] = $user->getRoleNames();
            // $user['datas'] = Data::where('users_id', $id)->get();
            unset($user['roles']);

            return response()->json([
                'status' => 'success',
                'user' => $user
            ], 200);
            // return Response(['data' => $user], 200);
        }
        return Response(['data' => 'Enter valid token'], 401);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        $validatedData = $request->validate([
            'nik_user' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
        ]);

        $user->nik_user = $validatedData['nik_user'];
        $user->full_name = $validatedData['full_name'];
        $user->address = $validatedData['address'];
        $user->phone_number = $validatedData['phone_number'];
        $user->email = $validatedData['email'];

        if ($user->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'User updated successfully',
                'user' => $user
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update user'
            ], 500);
        }
    }

}