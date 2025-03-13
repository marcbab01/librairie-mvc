<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Membre</title>
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
        </ul>
    </nav>
    <div class="conteneur">
        <form method="post">
            <h2>Nouveau User</h2>
            <label>Nom de famille</label>
            <input type="text" name="lName" value="{{user.lName}}">
            <label>Prénom</label>
            <input type="text" name="fName" value="{{user.fName}}">
            <label>Nom d'utilisateur</label>
            <input type="text" name="username" value="{{user.username}}">
            <label>Mot de passe</label>
            <input type="text" name="password">
            <label>Courriel</label>
            <input type="email" name="email" value="{{user.email}}">
            <label>Privilège</label>
            <select name="privilege_id">
                <option value="">Select privilege</option>
                {% for privilege in privileges %}
                    <option value="{{ privilege.id }}" {% if privilege.id== user.privilege_id %} selected {% endif %}>{{ privilege.privilege }}</option>
                {% endfor %}
            </select>
            <input type="submit" class="bouton" value="save">
        </form>
    </div>
</body>
</html>