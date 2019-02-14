<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
        {
            //création des catégories
            App\Categorie::create([
                'title' => 'HOMME'
            ]);
            App\Categorie::create([
                'title' => 'FEMME'
            ]);

            //On prend garde de bien supprimer toutes les images avant de commencer les seeders
            Storage::disk('local')->delete(Storage::allFiles());

            //Création de 30 produits à partir de la factory
            factory(App\Product::class, 50)->create()->each(function($product){
                //associons une catégorie à un produit que nous venons de créer
                $categorie = App\Categorie::find(rand(1,2));

                //Pour chaque $product on lui associe une catégorie particuliere
                $product->categorie()->associate($categorie);

                $link = str_random(12).'.jpg'; // hash de lien pour la sécurité (injection de scripts de protection)
                $file = file_get_contents('http://placeimg.com/640/480/arch');
                Storage::disk('local')->put($link, $file);

                $product->update([
                    'url_image' => $link
                ]);


                $product->save();
            });
    }
}
