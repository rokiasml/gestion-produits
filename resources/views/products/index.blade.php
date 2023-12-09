<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1e272e;
            color: #ecf0f1;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #2c3e50;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #2c3e50;
            color: #ecf0f1;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .actions {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 5px;
            text-decoration: none;
            color: #ecf0f1;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-light{
            background-color:#ecf0f1;
            color:black
        }

        .btn-primary {
            background-color: #3498db;
        }

        .btn-success {
            background-color: #2ecc71;
        }

        .btn:hover {
            opacity: 0.8;
        }
        </style>
</head>
<body>

<h1>Commandez Chez Nous ET Recevez Votre Commande Rapidement!</h1>
<div class="row">
        @foreach ($listeproducts  as $product)
            <div class="col-3 ">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nomproduit }}</h5>
                        <p class="card-text">{{ $product->prix }} $</p>
                     
                        <form action="{{ route('cart.add', ['idproduit' => $product->idproduit]) }}" method="post">
                    @csrf
                    <button class="btn btn-light" type="submit">Add to Cart</button>
                </form>


                    </div>
                </div>
            </div>
            
            @if($loop->iteration % 3 == 0)
                </div><div class="row">
            @endif
        @endforeach
    </div>



</body>
</html>
