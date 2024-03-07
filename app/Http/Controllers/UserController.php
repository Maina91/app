<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request)
    {
        return view('create');
    }
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'  =>  'required|min:8|confirmed',
            'gender' => 'required',
            'country' => 'required'

        ]);
        $user=new User();
        $user->name=$validatedData['name'];
        $user->email=$validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->gender=$validatedData['gender'];
        $user->country=$validatedData['country'];

        $res = $user->save();
        if($res){
            return redirect()->route('login')->with('success', 'successfully registered.');
        }
        else{
            return back()->with('fail','something went wrong');
        }
    } 


    public function dashboard()
    {
        $users = User::all(); // or fetch users data from your model
    
        $user = Auth::user();

        return view('dashboard', compact('users'));
    }
    
    
    public function view(User $user)
    {
        return view('view', ['user' => $user]);
    }
    

    public function edit(User $user){
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return redirect()->route('user.dashboard', ['user' => $user->id])->with('success', 'User updated successfully.');

    }
    

    

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.dashboard', ['user' => $user->id])->with('success', 'User deleted successfully.');
    }
    
 }