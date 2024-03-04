@extends('layouts.app1')
@section('contenu')
    <div class="hero-wrap hero-bread" style="background-image: url('http://localhost/Biofood/public/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil</a></span> <span>Produits</span></p>
            <h1 class="mb-0 bread">Produits</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 mb-5 text-center">
    <ul class="product-category">
    <li><a href="{{URL::to('/shop')}}" class="{{(request()->is('shop')?'active':'')}}"> Tout</a></li>
@foreach ($categories as $categorie)
  <li><a href="http://localhost/Biofood/public/select_par_cat/{{$categorie->category_name}}" class="{{(request()->is('select_par_cat/'.$categorie->category_name)?'active':'')}}" >{{$categorie->category_name}}</a></li>

@endforeach
    </ul>
    </div>
</div>
         <div class="row">
        @foreach ($produits as $produit)
<div class="col-md-6 col-lg-3 ftco-animate">
<div class="product">
<a href="#" class="img-prod"><img class="img-fluid" src="http://localhost/Biofood/public/storage/product_images/{{$produit->product_image}}" >
<div class="overlay"></div>
</a>
<div class="text py-3 pb-4 px-3 text-center">
<h3><a href="#">{{$produit->product_name}}</a></h3>
<div class="d-flex">
<div class="pricing">
<span class="price-sale">{{$produit->product_price}} DA</span>
</div>
</div>
<div class="bottom-area d-flex px-3">
<div class="m-auto d-flex">
{{--<a href="{{URL::to('/shop')}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
  <span><i class="ion-ios-menu"></i></span>
    </a>--}}
@if ($produit->status=='1')
<a href="http://localhost/Biofood/public/ajouter_au_panier/{{$produit->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
<span> <i class="ion-ios-cart"> </i> </span>
</a>
@elseif($produit->status=='0')
<label class="badge badge-danger"> Rupture de stock </label>
@endif
{{--<a href="{{URL::to('/shop')}}" class="heart d-flex justify-content-center align-items-center ">
<span><i class="ion-ios-heart"></i></span>
</a>--}}
</div>
</div>
</div>
</div>
</div>
       @endforeach

</div>
    <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              {{--<ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="{{URL::to('/shop')}}">2</a></li>
                <li><a href="{{URL::to('/shop')}}">3</a></li>
                <li><a href="{{URL::to('/shop')}}">4</a></li>
                <li><a href="{{URL::to('/shop')}}">5</a></li>
                <li><a href="{{URL::to('/shop')}}">&gt;</a></li>
              </ul>--}}
            </div>
          </div>
        </div>
    </div>
    </section>
	<div class="row">
		<div class="col-md-12 text-center">
		</div>
	  </div>

@endsection