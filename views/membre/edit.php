<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre Edit</title>
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
        <form method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <h2>Modifier Membre</h2>
            <label for="lName">Nom</label>
            <input type="text" name="lName" value="{{membre.lName}}" id="lName">
            {% if errors.lName is defined %}
                <span class="error"> {{errors.lName}}</span>
            {% endif %}
            <label for="fName">Prénom</label>
            <input type="text" name="fName" value="{{membre.fName}}" id="fName">
            {% if errors.fName is defined %}
                <span class="error"> {{errors.fName}}</span>
            {% endif %}
            <label for="email">Courriel</label>
            <input type="email" name="email" value="{{membre.email}}" id="email">
            {% if errors.email is defined %}
                <span class="error"> {{errors.email}}</span>
            {% endif %}
            <label for="phone">Téléphone</label>
            <input type="tel" name="phone" value="{{membre.phone}}" id="phone">
            {% if errors.phone is defined %}
                <span class="error"> {{errors.phone}}</span>
            {% endif %}
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
</body>
</html>