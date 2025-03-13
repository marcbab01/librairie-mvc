<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset }}css/style.css">
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
    {% if errors is defined %}
          <div class="error">
            <ul>
            {% for error in errors %}
                <li>{{ error }}</li>        
            {% endfor %}
            </ul>
          </div>
         {% endif %}
        <form method="post">
            <h2>Login</h2>
            <label>Username
                <input type="text" name="username" value="{{ user.username }}">
            </label>
            <label>Password
                <input type="password" name="password" value="{{user.password}}">
            </label>
            <input type="submit" class="btn" value="login">
        </form>
    </div>
</body>
</html>