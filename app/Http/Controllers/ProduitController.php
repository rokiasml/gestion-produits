<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    public function indexApi(){
        $listepro=Produit::all();
        return $listepro;
    }

    public function index()
    {  

      $userId = Auth::id();
    $listepro = Produit::where('user_id', $userId)->get();
    return view('produits.index', ['listepro' => $listepro]);
      

    }
    
    public function create()
    {
        return view('produits.create');
    }
    public function store(Request $request)
    {

    $validate = Validator::make($request->all(), [
        'nomproduit' => 'required',
        'prix' => 'required',
        'descriptionp' => 'required',
    ],[
        'nomproduit.required' => 'le nom est obligatoire.',
        'prix.required'=>'le prix est obligatoire',
        'descriptionp.required'=> 'la description est obligatoire'
    ]);
  
    if($validate->fails()){
    return back()->withErrors($validate->errors())->withInput();
   }

    $chemin = 'images';
    $file = $request->file('image');
    $extension=$file->getClientOriginalExtension();
    $taille=$file->getSize();

    if($taille>100000)
    {
        return redirect()->route('produits.create')->with('message','image doit etre de taille<100000');
   
    }
    else
    {
   
    $chemin=$chemin.'/'.$file->getClientOriginalName();
   
   
    $file->move("images",$file->getClientOriginalName());
    }


    $produit_nouveau=$request->post();
    $produit_nouveau['image']=$chemin;

    
    Produit::create($produit_nouveau);
   
   return redirect()->route('produits.create')->with('msg','Le produit est bien ajouté');

    }
    public function edit(string $id)
    {
        $listepro=Produit::all();

        $listepro=Produit::findorFail($id);

        return view('produits.edit',['listepro'=>$listepro]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'nomproduit' => 'required',
            'prix' => 'required',
            'descriptionp' => 'required',
        ], [
            'nomproduit.required' => 'Le nom est obligatoire.',
            'prix.required' => 'Le prix est obligatoire',
            'descriptionp.required' => 'La description est obligatoire'
        ]);
    
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
    
        $chemin = 'images';
        $file = $request->file('image');
    
        // Vérifiez si un fichier a été téléchargé
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $taille = $file->getSize();
    
            if ($taille > 100000) {
                return redirect()->route('produits.edit', $id)->with('message', 'L\'image doit être de taille < 100000');
            }
    
            $chemin = $chemin . '/' . $file->getClientOriginalName();
            $file->move("images", $file->getClientOriginalName());
        }
    
        // Récupérer le produit existant par son ID
        $produit = Produit::find($id);
    
        if (!$produit) {
            return redirect()->route('produits.index')->with('message', 'Produit non trouvé.');
        }
    
        // Mettre à jour les attributs du produit
        $produit->nomproduit = $request->input('nomproduit');
        $produit->prix = $request->input('prix');
        $produit->descriptionp = $request->input('descriptionp');
    
        // Mettre à jour l'image uniquement si un fichier a été téléchargé
        if ($file) {
            $produit->image = $chemin;
        }
    
        // Sauvegarder les modifications
        $produit->save();
    
        return redirect()->route('produits.index')->with('msg', 'Le produit est bien modifié');
    }
    
    public function destroy(string $id)
    {
        
        $listepro=Produit::findorFail($id);
        $listepro->delete();
        return response()->json('le produit est bien suppprimée');   
    }

}
