<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Auth;

class ClientController extends Controller
{
    public function index()
    {
       try {
           
            $clients = Client::all();
            return view('clients.index', compact('clients'));
           
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function addClient(Request $request)
    {
        try {
            $validateClient = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|unique:clients,email',
                    'name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                ],
                [
                    'email.required' => "Please enter email.",
                    'name.required' => "Please enter name.",
                    'address.required' => "Please enter address.",
                    'city.required' => "Please enter city.",
                    'email.unique' => "Email already exists",
                    'email.email' => "Please enter email",
                ]
            );

            if ($validateClient->fails()) {
                return Redirect::back()->withErrors($validateClient)->withInput();
            }

            $client = new Client();
            $client->name = $request->name;
            $client->email = $request->email;
            $client->address = $request->address;
            $client->city = $request->city;
            $client->notes = $request->notes;
        
            if ($client->save()) {
                return Redirect('clients')->with('success', "Client created successfully.");
            } else {
                return Redirect::back()->with('error', "Something went wrong");
            }

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function editClient($client_id)
    {
        try {
          
            $client = Client::findorfail($client_id);
            return view('clients.edit', compact('client'));
           
        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function updateClient(Request $request)
    {
        try {
            $validateClient = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|unique:clients,email,' . $request->id,
                    'name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                ],
                [
                    'email.required' => "Please enter email.",
                    'name.required' => "Please enter name.",
                    'address.required' => "Please enter address.",
                    'city.required' => "Please enter city.",
                    'email.unique' => "Email already exists",
                    'email.email' => "Please enter email",
                ]
            );

            if ($validateClient->fails()) {
                return Redirect::back()->withErrors($validateClient)->withInput();
            }

            $client = Client::findorfail($request->id);
            $client->name = $request->name;
            $client->email = $request->email;
            $client->address = $request->address;
            $client->city = $request->city;
            $client->notes = $request->notes;

            if ($client->update()) {
                return Redirect('clients')->with('success', "Client updated successfully.");
            } else {
                return Redirect::back()->with('error', "Something went wrong");
            }

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong");
        }
    }

    public function deleteClient($client_id)
    {
        try {
            if ($client_id) {
                $client = Client::find($client_id);
                if ($client) {
                    if ($client->delete()) {
                        return Redirect('clients')->with('success', "Client remove successfully.");
                    } else {
                        return Redirect::back()->with('error', "Something went wrong.");
                    }
                } else {
                    return Redirect::back()->with('error', "Client not found.");
                }
            } else {
                return Redirect::back()->with('error', "Client not found.");
            }

        } catch (\Throwable $th) {
            return Redirect::back()->with('error', "Something went wrong.");
        }
    }
}
