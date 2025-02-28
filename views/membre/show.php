<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Livres</title>
        <link rel="stylesheet" href="{{ asset }}/css/style.css">
    </head>
    <body>
        <div class="conteneur">
            <h1>Membre</h1>
            <p><strong>Nom: </strong>{{membre.lName}}</p>
            <p><strong>Prénom: </strong>{{membre.fName}}</p>
            <p><strong>Courriel: </strong>{{membre.email}}</p>
            <p><strong>Téléphone: </strong>{{membre.phone}}</p>
            <a href="{{base}}/membre/edit?id={{membre.id}}" class="bouton">Edit</a>
            <form method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <button type="submit" class="bouton">Delete</button>
            </form>
        </div>
    </body>
</html>