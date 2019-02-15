@extends('layouts.master')

@section('content')
<small><a href= '{{url('/')}}'> Boutique </a>> Solde</small>
{{$products->links()}}
<p class="text-right">SOLDE : {{$count}} résultats</p>
<div class="row">
  @forelse($products as $product)
  <div class="card col-3"><a href="{{url('product', $product->id)}}">
        <img src="{{asset('images/'.$product->url_image)}}" class="card-img-top" alt="{{$product->title}}">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('product', $product->id)}}">{{$product->title}}</a></h5>
          <p class="card-text"><small class="text-muted">Code : {{$product->code}} </small></p>
          @if ($product->code === 'SOLDE')
          <p class="card-text" style="color:red;text-decoration: line-through"><small class="text-muted">Prix : {{$product->price}} €</small></p>
          <span style='color:green; font-weight:bold'> @php echo number_format($product->price*0.8, 2)@endphp € <small style='font-size:1.2em;color:red;font-weight:bold; border:3px solid yellow; background-color:yellow; border-radius:10px;margin-left:5%;'>-20% !!</small></span>
          @else 
          <p class="card-text"><small class="text-muted" style='font-weight:bold'>Prix : {{$product->price}} €</small></p>
          @endif
        </div>
  </div></a>
      @empty
      <p>Désolé pour l'instant aucun produit n'est publié sur le site</p>
@endforelse
</div>
 
@endsection 