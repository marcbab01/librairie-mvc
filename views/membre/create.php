<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau Membre</title>
    <link rel="stylesheet" href="{{ asset }}/css/style.css">
</head>
<body>
    <div class="conteneur">
        <form method="post">
            <h2>Nouveau Membre</h2>
            <label for="lName">Nom</label>
            <input type="text" name="lName" value="{{membre.lName}}" id="lname">
            {% if errors.lName is defined %}
                <span class="error"> {{errors.lName}}</span>
            {% endif %}
            <label for="fName">Prénom</label>
            <input type="text" name="fName" value="{{membre.fName}}" id="fname">
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
            <input type="submit" class="bouton" value="save">
        </form>
    </div>
</body>
</html>