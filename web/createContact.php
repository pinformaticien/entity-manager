<?php

require_once '../src/App/Manager/ContactManager.php';
require_once '../src/App/Entity/Contact.php';

use App\Entity\Contact;
use App\Manager\ContactManager;

$contact = new Contact();
$contact
    ->setNom($_POST['lastName'])
    ->setPrenom($_POST['firstName'])
    ->setTel($_POST['phone'])
    ->setMel($_POST['mail']);

$contactManager = new ContactManager();
$saveIsOk = $contactManager->save($contact);

if ($saveIsOk) {
    $message = "Le contact a bien été ajouté";
} else {
    $message = "Le contact n'a pas été ajouté";
}

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
    <h1>Insertion d'un contact</h1>
    <p><?= $message ?></p>
</body>
</html>
