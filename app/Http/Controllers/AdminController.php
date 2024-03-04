<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\cart;
use App\Admin;
use Hash;
use Session;

class AdminController extends Controller
{
    //
    public function dashboard(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        return view('admin.dashboard');
    }
    public function ajouterproduit(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        return view('admin.dashboard');
    }
    public function ajouterslider(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        return view('admin.dashboard');
    }
    
    public function commandes(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        $orders= Order::get();

        $orders->transform(function($order,$key){
             $order->panier = unserialize($order->panier);

             return $order;
        });

        return view('admin.commandes')->with('orders',$orders);
    }
    public function creer_compte_admin(Request $request){
        try{
        $this->validate($request, ['email' =>'email|required',
                                     'password' =>'required|min:4']);
        
       $admin = new admin();
       $admin->email =$request->input('email');
       $admin->password = bcrypt($request->input('password'));
       $admin->save();
       return back()->with('status', 'Votre compte a été créér avec succès');
        }
        catch(\Exception $e){
            Session::put('error');
            return back()->with('error', 'Vous avez deja un compte');
        }
    
     }

     public function acceder_compte_admin(Request $request){

        $this->validate($request, ['email' =>'email|required',
        'password' =>'required']);
        $admin = Admin::where('email',$request->input('email'))->first();

        if ($admin) {
            if (Hash::check($request->input('password'),$admin->password)){
                Session::put('admin',$admin);
                return redirect('/admin');
            }else {
                return back()->with('status', 'Mauvais mot de passe ou Email ');
             }
            } else {
                return back()->with('status', 'Vous n'."'".'avez pas de compte');
            }
        }
    
    public function logout_admin(){
           Session::forget('admin');
           return back();
    }

    public function admin_login(){
        return view('admin.login');
    }
    public function signup_admin(){
        return view('admin.signup');
    }
}
