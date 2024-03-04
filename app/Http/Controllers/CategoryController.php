<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoryController extends Controller
{
    //
    public function ajoutercategorie(){
      if(!Session::has('admin')){
        return view('admin.login');
    }
      return view('admin.ajoutercategorie');

    }
    public function sauvercategorie(Request $request){

      $this->validate($request, ['category_name' => 'required|unique:categories']);

      $catogorie =New category();
      $catogorie->category_name = $request ->input('category_name');
      $catogorie->save();

      return redirect('/ajoutercategorie')-> with('status' , 'La catégorie' .$catogorie->category_name.' a été ajoutée avec succès.');

    }
    public function categories(){
      if(!Session::has('admin')){
        return view('admin.login');
    }
      $categories = category::get();
      return view('admin.categories') -> with('categories',$categories);
    }
    public function edit_categorie($id){

      $categorie = category::find($id);
      return view('admin.editcategorie')->with ('categorie',$categorie);

    }
    public function modifiercategorie(Request $request){

      $this->validate($request, ['category_name' => 'required|unique:categories']);

      $catogorie =category::find($request->input('id'));
      $catogorie->category_name = $request ->input('category_name');
      $catogorie->update();

      return redirect('/categories')-> with('status' , 'La catégorie '  .$catogorie->category_name.' a été modifiée avec succès.');
    
    }
    public function supprimercategorie($id){

      $categorie = category::find($id);
      $categorie->delete();

      return redirect('/categories')-> with('status' , 'La catégorie '  .$categorie->category_name.' a été supprimée avec succès.');

    }

}
