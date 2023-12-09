<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productsController extends Controller
{
    public function indexApi(){
        $listeproducts=Produit::all();
        return $listeproducts;
    }
    public function index()
    {  $userId = Auth::id();
        $listeproducts = Produit::where('user_id', $userId)->get();
        return view('products.index',['listeproducts'=>$listeproducts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view ('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
