<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; // importez l'alias de la classe Book plus partique à utiliser dans le code 
use App\Categorie;
use Cache;


class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct(){

        // méthode pour injecter des données à une vue partielle 
        view()->composer('partials.menu', function($view){
            $categories = Categorie::pluck('title', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories ); // on passe les données à la vue
        });
    }

    public function index(){
        $products = Product::paginate($this->paginate); //->paginate($this->paginate);

        return view('front.index', ['products' => $products]);

    }
    public function show(int $id){

        
        $product = Product::find($id);

        
        return view('front.show', ['product' => $product]);
    }
    public function showProductByCat(int $id){
        
        $categorie= Categorie::find($id);

        $products = $categorie->products()->paginate($this->paginate);

        return view('front.categorie', ['products' => $products, 'categorie' => $categorie]);
    }
}
