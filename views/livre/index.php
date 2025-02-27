<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Livres</title>
    <link rel="stylesheet" href="css/main.css">
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
        {% for client in clients %}
        <tr>
            <td><a href="{{base}}/livre/show?id={{livre.id}}">{{livre.titre}}</a></td>
            <td>{{livre.auteur}}</td>
            <td>{{livre.categorie_id}}</td>
            <td>{{livre.anneePublication}}</td>
        </tr>
        {% endfor %}
    </table>
</body>
</html>