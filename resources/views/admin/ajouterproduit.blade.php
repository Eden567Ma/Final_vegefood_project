@extends('layouts.appadmin')
@section('title')
    Ajouter Produits
@endsection
@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter produit</h4>
                  @if (Session::has('status'))
                  <div class="alert alert-success">
                    {{Session::get('status')}}
                  </div>
                  @endif
                  @if (count($errors)> 0)
                   <div class="alert alert-danger">
                     <ul> 
                       @foreach ($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach  
                      </ul>    
                   </div>                      
                  @endif
                      {!!Form::open(['action' => 'ProductController@sauverproduit', 'method' => 'POST', 'class' => 'cmxform' ,'id' => 'commentForm','enctype'=> 'multipart/form-data'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::label('','Nom Du produit ', ['for' => 'cname'])}}
                        {{Form::text('product_name',' ',['class'=>'form-control', 'id'=>'cname' ])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('','Prix Du produit ', ['for' => 'cname'])}}
                        {{Form::text('product_price',' ',['class' => 'form-control', 'id'=>'cname' ])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('','Catégorie du produit :')}}
                        {{Form::select('product_category',$categories,null,['placeholder' => 'select category','class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label(' ','Image', ['for' => 'cname'])}}
                        {{Form::file('product_image',['class'=>'form-control', 'id'=>'cname' ])}}
                    </div>
                      {{Form::submit('Ajouter', ['class' => 'btn btn-primary'])}}
                      {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>    
@endsection

@section('scripts')
{{--<script src="backend/js/form-validation.js"></script>
<script src="backend/js/bt-maxLength.js"></script>--}}
@endsection