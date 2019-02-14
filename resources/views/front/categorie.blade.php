@extends('layouts.master')

@section('content')
<small><a href= '{{url('/')}}'> Boutique </a>> {{$categorie->title?? 'aucune catégorie'}}</small>
{{$products->links()}}
<p class="text-right">{{$categorie->title}} : {{$count}} résultats</p>
<div class="row">
  @forelse($products as $product)
  <div class="card col-3"><a href="{{url('product', $product->id)}}">
        <img src="{{asset('images/'.$product->url_image)}}" class="card-img-top" alt="{{$product->title}}">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('product', $product->id)}}">{{$product->title}}</a></h5>
          <p class="card-text"><small class="text-muted">Code : {{$product->code}} </small></p>
          <p class="card-text"><small class="text-muted">Prix : {{$product->price}} €</small></p>
          <p class="card-text">{{$categorie->title}}</p>
        </div>
  </div></a>
      @empty
      <p>Désolé pour l'instant aucun produit n'est publié sur le site</p>
@endforelse
</div>
 
@endsection 