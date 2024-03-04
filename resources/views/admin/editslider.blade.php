@extends('layouts.appadmin')
@section('title')
    Modifier Sliders
@endsection
@section('contenu')
<div class="main-panel">
    <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Slider</h4>
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
                      {!!Form::open(['action' => 'SliderController@modifierslider', 'method' => 'POST', 'class' => 'cmxform' ,'id' => 'commentForm' , 'enctype'=> 'multipart/form-data'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                          {{Form::hidden('id', $slider->id)}}
                          {{Form::label('','description01' , ['for' => 'cname'])}}
                          {{Form::text('description01',$slider->description01,['class'=>'form-control', 'id'=>'cname' ])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('','description01' , ['for' => 'cname'])}}
                        {{Form::text('description02',$slider->description02,['class'=>'form-control', 'id'=>'cname' ])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('','Image' , ['for' => 'cname'])}}
                        {{Form::file('slider_image',['class'=>'form-control', 'id'=>'cname' ])}}
                    </div>
                      {{Form::submit('Modifier', ['class' => 'btn btn-primary'])}}
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