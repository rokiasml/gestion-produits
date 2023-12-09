<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('idproduit'); // Assurez-vous que votre requête contient l'ID du produit

        // Vous pouvez utiliser Eloquent pour récupérer le produit à partir de la base de données
        $product = Produit::find($productId);

        if (!$product) {
            // Gérez le cas où le produit n'est pas trouvé
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Utilisez la session pour gérer le panier
        $cart = session()->get('cart', []);

        // Vérifiez si le produit est déjà dans le panier
        if (array_key_exists($productId, $cart)) {
            // Mettez à jour la quantité si le produit est déjà dans le panier
            $cart[$productId]['quantite'] += 1;
        } else {
            // Ajoutez le produit au panier avec une quantité de 1
            $cart[$productId] = [
                'image' => $product->image,
                'nomproduit' => $product->nomproduit,
                'prix' => $product->prix,
                'quantite' => 1,
            ];
        }

        // Enregistrez le panier dans la session
        session(['cart' => $cart]);

        // Réponse JSON pour indiquer que le produit a été ajouté au panier avec succès
        return response()->json(['message' => 'Product added to cart']);
    }
    public function showCart()
{
    $cart = session()->get('cart', []);
    return view('cart.show', compact('cart'));
}
}
