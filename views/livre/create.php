<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Livre</title>
    <link rel="stylesheet" href="{{asset}}/css/style.css">
</head>
<body>
    <div class="conteneur">
        <form action="livre-store.php" method="post">
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
                <?php 
            foreach($select as $row){

            ?>
                <option value="<?=$row['id']?>"><?= $row['categorie'];?></option>
                <?php
                }
            ?>
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