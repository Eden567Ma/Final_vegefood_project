<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use Session;
class SliderController extends Controller
{
    //
    public function ajouterslider(){
        if(!Session::has('admin')){
            return view('admin.login');
        }
        return view('admin.ajouterslider');
    }
    public function sauverslider( Request $request){
      
        $this->validate($request,['description01' => 'required',
                                  'description02' => 'required', 
                                  'slider_image' => 'image|nullable|max:1999']);

       if($request->hasfile('slider_image')){
           //1: Get file name with ext
           $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
           //2: Get just file name
           $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
           //3: Get just file extension
           $extension =$request ->file('slider_image')->getClientOriginalExtension();
           //4: file name to store
           $fileNameTotore = $fileName.'_'.time().'.'.$extension;
           //uploader l'image
           $path = $request->file('slider_image')->storeAs('public/slider_images',$fileNameTotore);
       }
       else{
           $fileNameTotore = 'noimage.jpg';
       }
    
       $slider = new Slider();
       $slider->description01 = $request->input('description01');
       $slider->description02 = $request->input('description02');
       $slider->slider_image = $fileNameTotore;
       $slider->status = 1;

       $slider->save();

       return redirect('/ajouterslider')->with('status', 'Le Slider a été inséré avec succès !');
    }
    public function sliders(){
        if(!Session::has('admin')){
            return view('admin.login');
        }

        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders',$sliders);
    }
    
    public function edit_slider($id){
        $slider = Slider::find($id);

        return view('admin.editslider')->with('slider',$slider);
    }

    public function modifierslider(Request $request){
        $this->validate($request,['description01' => 'required',
                                  'description02' => 'required', 
                                  'slider_image' => 'image|nullable|max:1999']);

        $slider = Slider::find($request->input('id'));
        $slider->description01 = $request->input('description01');
        $slider->description02 = $request->input('description02');

     if($request->hasfile('slider_image')){
       //1: Get file name with ext
      $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
       //2: Get just file name
      $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
       //3: Get just file extension
      $extension =$request ->file('slider_image')->getClientOriginalExtension();
       //4: file name to store
      $fileNameTotore = $fileName.'_'.time().'.'.$extension;
      //uploader l'image
      $path = $request->file('slider_image')->storeAs('public/slider_images',$fileNameTotore);

   if($slider->slider_image != 'noimage.jpeg'){
     Storage::delete('public/slider_images/'.$slider->slider_image);

}
    $slider->slider_image =$fileNameTotore;

  }    
$slider->update();

     return redirect('/sliders')->with('status', 'Le Slider a été modifié avec succès !');
    }

public function supprimerslider($id){
    $slider = Slider::find($id);
        if($slider->slider_image != 'noimage.jpeg'){
            Storage::delete('public/slider_images/'.$slider->slider_image);
        }

        $slider->delete();

        return redirect('/sliders')->with('status', 'Le Slider a été Supprimé avec succès !');
    }

public function  desactiver_slider($id){
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider-> update();

        return redirect('/sliders')->with('status', 'Le Slider a été désactivé avec succès !');
   }  

public function activer_slider($id){
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider-> update();

        return redirect('/sliders')->with('status', 'Le Slider a été activé avec succès !');
    }
}