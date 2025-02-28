<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Livres</title>
        <link rel="stylesheet" href="{{ asset }}/css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>Livres</h1>
            <p><strong>Titre: </strong>{{livre.titre}}</p>
            <p><strong>Auteur: </strong>{{livre.auteur}}</p>
            <p><strong>Catégorie: </strong>{{livre.categorie_id}}</p>
            <p><strong>Annére de Publication: </strong>{{livre.anneePublication}}</p>
            <a href="{{base}}/livre/edit?id={{livre.id}}" class="bouton">Edit</a>
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <button type="submit" class="bouton">Delete</button>
            </form>
        </div>
    </body>
</html>