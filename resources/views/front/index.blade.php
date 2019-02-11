@extends('layouts.master')

@section('content')
{{$products->links()}}
<div class="card-deck">
@forelse($products as $product)
<div class="card"><a href="{{url('product', $product->id)}}">
        <img src="{{asset('images/'.$product->url_image)}}" class="card-img-top" alt="{{$product->title}}">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('product', $product->id)}}">{{$product->title}}</a></h5>
          <p class="card-text"><small class="text-muted">Prix : {{$product->price}}</small></p>
        </div>
      </div></a>
      @empty
<p>Désolé pour l'instant aucun produit n'est publié sur le site</p>
@endforelse
    </div>
@endsection 