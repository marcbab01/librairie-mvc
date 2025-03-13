<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Livre</title>
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
            <h2>Nouveau Livre</h2>
            <label for="titre">Titre</label>
            <input type="text" name="titre" value="{{livre.titre}}" id="titre">
            {% if errors.titre is defined %}
                <span class="error"> {{errors.titre}}</span>
            {% endif %}
            <label for="auteur">Auteur</label>
            <input type="text" name="auteur" value="{{livre.auteur}}" id="auteur">
            {% if errors.auteur is defined %}
                <span class="error"> {{errors.auteur}}</span>
            {% endif %}
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id">
                <option value="">Sélectionne une Catégorie</option>
                {% for categorie in categories %}
                <option value="{{categories.id}}" {% if categories.id== membres.categorie_id %} selected {% endif %}>{{categorie.categories}}</option>
                {% endfor %}
            </select>
            <label for="anneePublication">Année de Publication</label>
            <input type="text" name="anneePublication" value="{{livre.anneePublication}}" id="aneePublication">
            {% if errors.anneePublication is defined %}
                <span class="error"> {{errors.anneePublication}}</span>
            {% endif %}
            <input type="submit" class="bouton" value="save">
        </form>
    </div>
</body>
</html>