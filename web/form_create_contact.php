<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Ajouter un contact</h1>
<a href="index.php">Retour au sommaire</a>
<form action="createContact.php" method="post">
    <p>
        <label>Nom</label><br>
        <input type="text" name="lastName" id="">
    </p>
    <p>
        <label>Prenom</label><br>
        <input type="text" name="firstName" id="">
    </p>
    <p>
        <label>Tel</label><br>
        <input type="text" name="phone" id="">
    </p>
    <p>
        <label>email</label><br>
        <input type="text" name="mail" id="">
    </p>
    <p>

        <input type="submit" value="Ajouter">
    </p>
</form>
</body>
</html>