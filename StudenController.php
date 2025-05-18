<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class StudenController extends Controller
{
        public function muris(){
        return view('george.muris');
    }
    /////insert codes 


  public function save(Request $request){
   $data = $request->validate([
      'name'=>'required',
        'email'=>'required',
        'password'=>'required',
    ]);
    

  $user=User::create($data);
   }

   public function select(){
    $user = User::all();
    return view('george.select',['user'=>$user]);
   }
    
       public function edit(User $user){
       return view('george.edit',['User'=>$user]);
}
 // dd($user)
public function update(User $user, Request $request){
   // dd($request);
    $data = $request->validate([
   'name'=>'required',
    'email'=>'required',
   'password'=>'required',
       ]);
        $user->update($data);
        return redirect(route('user.select'));
        } 
        public function delete(User $user){
        $user->delete();
         return redirect(route('user.select'));
        }

       public function loginn(){
       return view('george.login');
}


        public function login(Request $request){
            $credentials=$request->only('name','password');
            if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(route('user.select'));
        }
        return back()->withErrors([
            'email'=>'invalid credentials',
        ])   ; 
    
    }
        public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //return redirect('/login');
        return redirect(route('george.loginn'));
    }
}
    