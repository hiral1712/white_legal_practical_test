<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        try {
            if(Auth::user()->role_id == 1 || Auth::user()->role_id == ''){
                $users = User::where('role_id', '!=', 1)->get();
                return view('employees.index', compact('users'));
            }
            else{
                return Redirect::route('login');
            }
            
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function addEmployee(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|unique:users,email',
                    'name' => 'required',
                    'phone' => 'required',
                    'password' => 'required',
                ],
                [
                    'email.required' => "Please enter email.",
                    'name.required' => "Please enter name.",
                    'password.required' => "Please enter password.",
                    'phone.required' => "Please enter phone.",
                    'email.unique' => "Email already exists",
                    'email.email' => "Please enter email",
                ]
            );

            if ($validateUser->fails()) {
                return Redirect::back()->withErrors($validateUser)->withInput();
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->status = $request->status;
            $user->password = Hash::make($request->password);
            $user->role_id = 2;

            if ($user->save()) {
                return Redirect('employees')->with('success', "Employee created successfully.");
            } else {
                return Redirect::back()->with('error', "Something went wrong");
            }

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function editEmployee($user_id)
    {
        try {
            if(Auth::user()->role_id == 1 || Auth::user()->role_id == ''){
                $user = User::findorfail($user_id);
                return view('employees.edit', compact('user'));
            }
            else{
                return Redirect::route('login');
            }
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function updateEmployee(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|unique:users,email,' . $request->id,
                    'name' => 'required',
                    'phone' => 'required',
                ],
                [
                    'email.required' => "Please enter email.",
                    'name.required' => "Please enter name.",
                    'phone.required' => "Please enter phone.",
                    'email.unique' => "Email already exists",
                    'email.email' => "Please enter email",
                ]
            );

            if ($validateUser->fails()) {
                return Redirect::back()->withErrors($validateUser)->withInput();
            }

            $user = User::findorfail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->status = $request->status;

            if (isset($request->password) && $request->password != '') {
                $user->password = Hash::make($request->password);
            }

            if ($user->update()) {
                return Redirect('employees')->with('success', "Employee updated successfully.");
            } else {
                return Redirect::back()->with('error', "Something went wrong");
            }

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function deleteEmployee($user_id)
    {
        try {
            if ($user_id) {
                $user = User::find($user_id);
                if ($user) {
                    if ($user->delete()) {
                        return Redirect('employees')->with('success', "Employee remove successfully.");
                    } else {
                        return Redirect::back()->with('error', "Something went wrong.");
                    }
                } else {
                    return Redirect::back()->with('error', "Employee not found.");
                }
            } else {
                return Redirect::back()->with('error', "Employee not found.");
            }

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong.");
        }
    }

}