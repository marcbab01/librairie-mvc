<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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