<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Product;
use Session;

class ProductController extends Controller
{
    //
    public function ajouterproduit(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        $categories = Category::All()->pluck('category_name' ,'category_name');
        return view('admin.ajouterproduit')->with('categories',$categories);
    }
    public function sauverproduit(Request $request){
        $this->validate($request,['product_name' => 'required|unique:products',
                                  'product_price' => 'required', 
                                  'product_category' => 'required',
                                  'product_image' => 'image|nullable|max:1999']);

       if($request->hasfile('product_image')){
           //1: Get file name with ext
           $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
           //2: Get just file name
           $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           //3: Get just file extension
           $extension =$request ->file('product_image')->getClientOriginalExtension();
           //4: file name to store
           $fileNameTotore = $fileName.'_'.time().'.'.$extension;
           //uploader l'image
           $path = $request->file('product_image')->storeAs('public/product_images',$fileNameTotore);
       }
       else{
           $fileNameTotore = 'noimage.jpg';
       }
    
       $product = new Product();
       $product->product_name = $request->input('product_name');
       $product->product_price = $request->input('product_price');
       $product->product_category = $request->input('product_category');
       $product->product_image = $fileNameTotore;
       $product->status = 1;

       $product->save();

       return redirect('/ajouterproduit')->with('status', 'Le produit '.$product->product_name.' a été inséré avec succès !');
 
    }
    public function produits(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        $produits = Product::get();
        return view('admin.produits')-> with ('produits',$produits);
    }
    public function edit_produit($id){

        $product= Product::find($id);
        $categories = Category::All()->pluck('category_name' ,'category_name');
        return view('admin.editproduit')->with('product',$product)->with('categories',$categories);
    }
    public function modifierproduit(Request $request){
        $this->validate($request,['product_name' => 'required',
                                  'product_price' => 'required', 
                                  'product_category' => 'required',
                                  'product_image' => 'image|nullable|max:1999']);

        $product = Product::find($request->input('id'));
        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');

       if($request->hasfile('product_image')){
           //1: Get file name with ext
           $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
           //2: Get just file name
           $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           //3: Get just file extension
           $extension =$request ->file('product_image')->getClientOriginalExtension();
           //4: file name to store
           $fileNameTotore = $fileName.'_'.time().'.'.$extension;
           //uploader l'image
           $path = $request->file('product_image')->storeAs('public/product_images',$fileNameTotore);

           if($product->product_image != 'noimage.jpeg'){
            Storage::delete('public/product_images/'.$product->product_image);
    
           }
           $product->product_image =$fileNameTotore;

       }
          $product->update();

          return redirect('/produits')->with('status', 'Le produit '.$product->product_name.' a été modifié avec succès !');
    }
    public function supprimerproduit($id){
        $product = Product::find($id);
        if($product->product_image != 'noimage.jpeg'){
            Storage::delete('public/product_images/'.$product->product_image);
        }

        $product->delete();
        return redirect('/produits')->with('status', 'Le produit '.$product->product_name.' a été Supprimé avec succès !');
    }

    public function activer_produit($id){
        $product = Product::find($id);
        $product->status = 1;
        $product-> update();

        return redirect('/produits')->with('status', 'Le produit '.$product->product_name.' a été activé avec succès !');
        
    }

    public function desactiver_produit($id){
        $product = Product::find($id);
        $product->status = 0;
        $product-> update();

        return redirect('/produits')->with('status', 'Le produit '.$product->product_name.' a été désactivé avec succès !');
        
    }
    
}

