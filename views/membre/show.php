<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Livres</title>
        <link rel="stylesheet" href="{{ asset }}/css/style.css">
    </head>
    <body>
        <nav class="navigation">
            <ul>
                <li><a href="{{ base }}/membres">Membres</a></li>
                {% if session.privilege_id == 1 %}
                <li><a href="{{ base }}/user/create">User</a></li>
                {% endif %}
                {% if guest %}
                <li><a href="{{ base }}/login">Login</a></li>
                {% else %}
                <li><a href="{{ base }}/logout">Logout</a></li>
                {% endif %}
                <li><a href="{{ base }}/membres">Membres</a></li>
                <li><a href="{{ base }}/livres">Livres</a></li>
            </ul>
        </nav>
        <div class="conteneur">
            <h1>Membre</h1>
            <p><strong>Nom: </strong>{{membre.lName}}</p>
            <p><strong>Prénom: </strong>{{membre.fName}}</p>
            <p><strong>Courriel: </strong>{{membre.email}}</p>
            <p><strong>Téléphone: </strong>{{membre.phone}}</p>
            <a href="{{base}}/membre/edit?id={{membre.id}}" class="bouton">Edit</a>
            <form action="/membres" method="post">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <button type="submit" class="bouton">Delete</button>
            </form>
        </div>
    </body>
</html>