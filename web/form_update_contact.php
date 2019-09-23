<?php
require_once '../src/App/Manager/ContactManager.php';
require_once '../src/App/Entity/Contact.php';

use App\Entity\Contact;
use App\Manager\ContactManager;

$contactManager = new ContactManager();
$contact = $contactManager->read($_GET['id']);
?>

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
    <h1>Modifier un contact</h1>
    <a href="index.php">Retour au sommaire</a>
    <form action="updateContact.php" method="post">
        <p>
            <label>Nom</label><br>
            <input type="text" name="lastName" id="" value="<?=$contact->getNom()?>">
        </p>
        <p>
            <label>Prenom</label><br>
            <input type="text" name="firstName" id="" value="<?=$contact->getPrenom()?>">
        </p>
        <p>
            <label>Tel</label><br>
            <input type="text" name="phone" id="" value="<?=$contact->getTel()?>">
        </p>
        <p>
            <label>email</label><br>
            <input type="text" name="mail" id="" value="<?=$contact->getMel()?>">
        </p>
        <input type="hidden" name="id" value="<?= $contact->getId() ?>">
        <p>

            <input type="submit" value="Modifier">
        </p>
    </form>
</body>
</html>