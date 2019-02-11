@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row justify-content-md-center">
          <div class="col col-lg-2">
            1 of 3
          </div>
          <div class="col-md-auto">
                <div class="text-center">
                        <img src="{{asset('images/'.$product->url_image)}}" class="rounded" alt="...">
                      </div>
          </div>
          <div class="col col-lg-2">
                <p class="card-text">{{$product->title}}</p>
                <p><small class="text-muted">ref : {{$product->reference}}</small></p>
                <p><small class="text-muted">{{$product->price}} €</small></p>
                <form class="form-inline">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>Taille</option>
                    <option value="1">{{$product->size}}</option>
                    <option value="2">{{$product->size}}</option>
                    <option value="3">{{$product->size}}</option>
                    </select>
                </form>
          </div>
        </div>
    </div>
    <h3>Description</h3>
    <p>{{$product->description}}
@endsection