<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
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

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 12px 8px;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: #ecf0f1;
            background-color: #3498db;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<h1>Ajouter un produit</h1>

<form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="nomproduit">Nom :</label>
        <input type="text" name="nomproduit" id="nomproduit" class="form-control">
    </div>

    <div class="form-group">
        <label for="prix">Prix:</label>
        <input type="text" name="prix" id="prix" class="form-control">
    </div>

    <div class="form-group">
        <label for="descriptionp">Description :</label>
        <input type="text" name="descriptionp" id="descriptionp" class="form-control">
    </div>

    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<a href="{{ route('produits.index') }}" class="btn">Retour à la liste des produits</a>

</body>
</html>
