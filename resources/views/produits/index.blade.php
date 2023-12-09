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

        .btn-danger {
            background-color: #e74c3c;
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

<h1>Liste des produits</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Utilisateur</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listepro as $produit)
            <tr>
                <td><strong>{{ $produit->nomproduit }}</strong></td>
                <td>{{ $produit->descriptionp }}</td>
                <td> {{ $produit->prix }}</td>
                <td><strong></strong> {{ $produit->user->name }}</td>
                <td><img src="{{ Storage::url($produit->image) }}" alt="Product Image"></td>
                <td class="actions">
                    <form action="{{ route('produits.destroy', $produit->idproduit) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('produits.edit', $produit->idproduit) }}" class="btn btn-primary">Modifier</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('produits.create') }}" class="btn btn-success">Ajouter un nouveau produit</a>

</body>
</html>
