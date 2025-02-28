<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset }}/css/style.css">
</head>
<body>
    <div class="conteneur">
        <h1>Membres</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Courriel</th>
                <th>Téléphone</th>
            </tr>
            {% for membre in membres %}
            <tr>
                <td><a href="{{base}}/membre/show?id={{membre.id}}">{{membre.lName}}</a></td>
                <td>{{membre.fName}}</td>
                <td>{{membre.email}}</td>
                <td>{{membre.phone}}</td>
            </tr>
            {% endfor %}
        </table>
    </div>
</body>
</html>