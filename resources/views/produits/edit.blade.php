<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produit</title>
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

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
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

<h1>Modifier produit</h1>

<form action="{{ route('produits.update', $listepro->idproduit) }}" method="POST">
    @csrf
    @method('put')

    <label for="nomproduit">Nom :</label>
    <input type="text" name="nomproduit" value="{{ $listepro->nomproduit }}">

    <label for="prix">Prix:</label>
    <input type="text" name="prix" value="{{ $listepro->prix }}">

    <label for="descriptionp">Description :</label>
    <input type="text" name="descriptionp" value="{{ $listepro->descriptionp }}">

    <label for="image">Image:</label>
    <input type="file" name="image" value="{{ $listepro->image }}">

    <input type="submit" value="Modifier" class="btn">
</form>

</body>
</html>
