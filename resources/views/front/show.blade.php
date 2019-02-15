@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row justify-content-md-center">
          <div class="col col-lg-2">
            <img src="{{asset('images/'.$product->url_image)}}" class="little" width="180" alt="{{$product->title}}">
            <img src="{{asset('images/'.$product->url_image)}}" class="little" width="180" alt="{{$product->title}}">
            <img src="{{asset('images/'.$product->url_image)}}" class="little" width="180" alt="{{$product->title}}">
          </div>
          <div class="col-md-auto">
                <div class="text-center">
                        <img src="{{asset('images/'.$product->url_image)}}" class="rounded" width='640'alt="{{$product->title}}">
                      </div>
          </div>
          <div class="col col-lg-2">
                <p class="card-text">{{$product->title}}</p>
                <p><small class="text-muted">ref : {{$product->reference}}</small></p>
                @if ($product->code === 'SOLDE')
          <p class="card-text" style="color:red;text-decoration: line-through"><small class="text-muted">Prix : {{$product->price}} €</small></p>
          <span style='color:green; font-weight:bold'> @php echo number_format($product->price*0.8, 2)@endphp € <small style='font-size:1.2em;color:red;font-weight:bold; border:3px solid yellow; background-color:yellow; border-radius:10px;margin-left:5%;'>-20% !!</small></span>
          @else 
          <p class="card-text"><small class="text-muted" style='font-weight:bold'>Prix : {{$product->price}} €</small></p>
          @endif
                <form class="form-inline">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    <option selected>Taille</option>
                    <option value="1">{{$product->size}}</option>
                    </select>
                </form>
          </div>
          <div style= "text-align:center"> 
            <h3>Description :</h3>
        <p>{{$product->description}}
        </div>
        </div>
    </div>
@endsection