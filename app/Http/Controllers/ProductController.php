<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;

use Storage;

class ProductController extends Controller
{
    protected $paginate = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->paginate);
        

        return view('back.maison.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            // permet de récupérer une collection type array avec une clé id => name
            $codes = Product::pluck('code', 'id')->all();
            $categories = Categorie::pluck('title', 'id')->all();
            $sizes = Product::pluck('size', 'id')->all();
            $status = Product::pluck('status', 'id')->all();
            
    
            return view('back.maison.create', ['products' => $codes, 'categories' => $categories, 'sizes' => $sizes, 'status' => $status, 'code' => $codes]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'categorie_id' => 'integer',
            'url_image' => 'image|max:3000',
            'code' => 'in:SOLDE,NEW',
            //'authors.*' => 'integer', // pour vérifier un tableau d'entiers il faut mettre authors.*
            //'status' => 'in:published,unpublished',
            //'title_image' => 'string|nullable', // pour le titre de l'image si il existe
            //'picture' => 'image|max:3000',
        ]);
        $product = Product::create($request->all());

       $im = $request->file('picture');
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->update([
                'url_image' => $link,
            ]);
        }



        return redirect()->route('maison.index')->with('message', 'Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

         return view('back.maison.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

       // $prices = Product::pluck('price', 'id')->all();
        $categories = Categorie::pluck('title', 'id')->all();

        return view('back.maison.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'categorie_id' => 'integer',
            'url_image' => 'image|max:3000',
            'code' => 'in:SOLDE,NEW',
            //'authors.*' => 'integer', // pour vérifier un tableau d'entiers il faut mettre authors.*
            //'status' => 'in:published,unpublished'
        ]);
        $product = Product::find($id);
        $product->update($request->all());

        $im = $request->file('picture');
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            // mettre à jour la table picture pour le lien vers l'image dans la base de données
            $product->update([
                'url_image' => $link,
            ]);
        }

        return redirect()->route('maison.index')->with('message', 'Succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('maison.index')->with('message', 'Supprimé avec panache!');
    }
}



// $books = Product::where('title', $id)-get();
//  return view ('index', ['books' => $books]);
