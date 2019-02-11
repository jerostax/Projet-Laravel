@extends('layouts.master')

@section('content')
<small>Boutique > Solde > {{$categorie->title?? 'aucun genre'}}</small>
{{$products->links()}}
<div class="container">
        @forelse($products as $product)
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
          </div>
        </div>
        <h3>Description</h3>
    <p>{{$product->description}}
        @empty
<li>Désolé pour l'instant aucun livre n'est publié sur le site</li>
@endforelse
    </div>
@endsection