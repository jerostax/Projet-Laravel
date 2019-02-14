@extends('layouts.master')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-md-6">
          <form action="{{route('maison.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}} 
                <div class="form-group">
                  <label for="exampleFormControlInput1">Titre</label>
                  <input type="text" name="title" value="{{$product->title}}" class="form-control" id="exampleFormControlInput1" placeholder="Titre du produit">
                  @if($errors->has('title')) <span class="error bg-warning text-warning">{{$errors->first('title')}}</span>@endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"placeholder="Description">{{$product->description}}</textarea>
                     @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Prix</label>
                    <input name="price" value="{{$product->price}}"type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prix">
                </div>
                <div class="form-select">
                      <label for="categorie">Catégorie</label>
                      <select class='select-size' id="categorie" name="categorie_id">
                            <option value="0" {{ is_null($categorie->title)? 'selected' : '' }} >Pas de catégorie</option>
                            @foreach($categories as $id => $title)
                              <option {{ (!is_null($product->categorie) and $product->categorie->id == $id)? 'selected' : '' }} value="{{$id}}">{{$title}}</option>
                            @endforeach
                      </select>
                </div>
                <div class="form-select">
                        <label for="exampleFormControlInput1">Taille</label>
                        <select class='select-size' name='size' id="inlineFormCustomSelectPref">
                       <option  @if($product->size == '46') selected @endif value='46'> 46 </option>
                       <option  @if($product->size == '48') selected @endif value='48'> 48 </option>
                       <option  @if($product->size == '50') selected @endif value='50'> 50 </option>  
                       <option  @if($product->size == '52') selected @endif value='52'> 52 </option>                                    
                       </select>
             </div>
                <div class="form-group">
                      <label for="exampleFormControlFile1">Image</label>
                        <input type="file" name="picture" class="form-control-file" id="exampleFormControlFile1">
                        @if($errors->has('picture')) <span class="error bg-warning">{{$errors->first('picture')}}</span> @endif
                </div>
                @if($product->url_image)
            <div class="form-group">
                  <h3>Image associée :<h3>
            <img width="300" src="{{url('images', $product->url_image)}}" alt="">
            </div>
            @endif
                <button type="submit" class="btn btn-primary">Modifier un produit</button>
              
            </div>

            <div class="col-md-6">
                   
                  <div class="form-group row">                                    
                        <label for="exampleFormControlInput1">Status</label>
                              <div class="col-sm-10">                                           
                                    <div class="form-check">
                                      <input type="radio" @if($product->status == 'Publié') checked @endif name="status" value="Publié" checked>Publier<br>
                                      <input type="radio" @if($product->status == 'Brouillon') checked @endif name="status" value="Brouillon" > Brouillon<br>
                                      <label class="form-check-label" for="gridCheck1">
                                                {{$status}}
                                      </label>
                                    </div>                                    
                                </div>
                    </div>
                        <div class="form-select">
                                    <label for="exampleFormControlInput1">Code</label>
                                     <select name='code'class='select-size' id="inlineFormCustomSelectPref">
                                    <option  @if($product->code == 'SOLDE') selected @endif value='SOLDE'> SOLDE </option>
                                    <option  @if($product->code == 'NEW') selected @endif value='NEW'> NEW </option>                                  
                                    </select>
                          </div>
                          <div class="form-group">
                                <label for="exampleFormControlInput1">Référence produit</label>
                                      <input type="text" name="reference" value="{{$product->reference}}" class="form-control" id="exampleFormControlInput1" placeholder="Référence du produit">
                                      @if($errors->has('reference')) <span class="error bg-warning text-warning">{{$errors->first('reference')}}</span>@endif
                    </div>
              </form>
          </div>
      </div>
</div>
@endsection