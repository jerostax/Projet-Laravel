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
        $products = Product::orderBy('created_at', 'desc')->paginate($this->paginate);
        
        

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
            $categories = Categorie::pluck('title', 'id')->all();

            return view('back.maison.create', ['categories' => $categories]);
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
            'price' => 'required',
            'reference' => 'required',         
        ]);

        $product = Product::create($request->all());

       $im = $request->file('picture');
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            $product->update([
                'url_image' => $link,
            ]);
        }



        return redirect()->route('maison.index')->with('message', 'Nouvel article créé avec succès !');
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
            'price' => 'required',
            'reference' => 'required', 
        ]);
        $product = Product::find($id);
        $product->update($request->all());

        $im = $request->file('picture');
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');

            $product->update([
                'url_image' => $link,
            ]);
        }

        return redirect()->route('maison.index')->with('message', 'Modifié avec succès !');
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

        return redirect()->route('maison.index')->with('message', 'Supprimé sans sommation !');
    }
}

