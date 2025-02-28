<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Livres</title>
    <link rel="stylesheet" href="{{ asset }}/css/style.css">
</head>
<body>
    <h1>Livres</h1>
    <table>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Catégorie</th>
            <th>Année de publication</th>
        </tr>
        {% for livres in livres %}
        <tr>
            <td><a href="{{base}}/livre/show?id={{livres.id}}">{{livres.titre}}</a></td>
            <td>{{livres.auteur}}</td>
            <td>{{livres.categories.categorie}}</td>
            <td>{{livres.anneePublication}}</td>
        </tr>
        {% endfor %}
    </table>
</body>
</html>