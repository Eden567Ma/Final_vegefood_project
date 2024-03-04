<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use App\Client;
use Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use Stripe\Stripe;
use App\Mail\SendMail;

class ClientController extends Controller
{
   
    public function home(){
        $sliders = Slider::where('status', 1)->get();
        $produits = Product::where('status', 1)->get();
        return view('client.home')->with('sliders', $sliders)->with('produits', $produits);
    }
    public function shop(){
        $categories = Category::get();
        $produits = Product::get();
        return view('client.shop')->with('categories', $categories)->with('produits', $produits);

    }
    public function select_par_cat($name){
        $categories = Category::get();
        $produits = Product::where('product_category', $name)->get();
        return view('client.shop')->with('categories', $categories)->with('produits', $produits);
    }
    
    public function ajouter_au_panier($id){
        $produit= Product::find($id);
        
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($produit, $id);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/shop');
    }

    public function panier(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);

        return view('client.cart', ['products' => $cart->items]);
        
    }

    public function modifier_panier(Request $request, $id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect::to('/panier');
    }

    public function retirer_produit($id){

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect('/panier');
    }
    
    public function paiement(){

        if(!Session::has('client')){
            return view('client.login');
        }
        if(!Session::has('cart')){
            return view('client.cart');
        }
        return view('client.checkout');
    }
    
    public function payer(Request $request){
      
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        Stripe::setApiKey('sk_test_51KLwqvBsF3GSDnD7wGT0bNkxcoyW0ovlQTh1yxYKACTWVtYIuIMO0yJg4eMUgUTccq98IfTVEItaFwJ5ZgC24IMs00Z8eBEDRd');

        try{

            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

          $order = new Order();
          $order->nom = $request->input('name');
          $order->adresse = $request->input('adresse');
          $order->panier = serialize($cart);
          $order->payment_id = $charge->id;
          $order->save();

          $orders= Order::where('payment_id',$charge->id)->get();

            $orders->transform(function($order,$key){
                 $order->panier = unserialize($order->panier);
    
                 return $order;
                
            });


        }
         catch(\Exception $e){
            Session::put('error');
            return redirect('/paiement')->with('error' ,$e->getMessage());;
        }

        Session::forget('cart');
        //Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/panier')->with('status', 'Achat accompli avec succès');
    }


    public function creer_compte(Request $request){
        try{
        $this->validate($request, ['email' =>'email|required',
                                     'password' =>'required|min:4']);
       
       $client = new client();
       $client->email =$request->input('email');
       $client->password = bcrypt($request->input('password'));
       $client->save();
       return back()->with('status', 'Votre compte a été créér avec succès');
        }

        catch(\Exception $e){
            Session::put('error');
            return back()->with('error', 'Vous avez deja un compte');
        }
    
     }

     public function acceder_compte(Request $request){

        $this->validate($request, ['email' =>'email|required',
        'password' =>'required']);
        $client = Client::where('email',$request->input('email'))->first();

        if ($client) {
            if (Hash::check($request->input('password'),$client->password)){
                Session::put('client',$client);
                return redirect('/shop');
            }else {
                return back()->with('status', 'Mauvais mot de passe ou Email ');
             }
            } else {
                return back()->with('status', 'Vous n'."'".'avez pas de compte');
            }
        }
    
    public function logout(){
           Session::forget('client');
           return back();
    }

    public function client_login(){
        return view('client.login');
    }
    public function signup(){
        return view('client.signup');
    }

    //
}
