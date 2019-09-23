<?php
require_once '../src/App/Manager/ContactManager.php';
require_once '../src/App/Entity/Contact.php';

use App\Entity\Contact;
use App\Manager\ContactManager;

$contactManager = new ContactManager();
$contact = $contactManager->read($_POST['id']);

$contact
    ->setNom($_POST['lastName'])
    ->setPrenom($_POST['firstName'])
    ->setTel($_POST['phone'])
    ->setMel($_POST['mail']);

$saveIsOk = $contactManager->save($contact);

if ($saveIsOk)
{
    $message = "Le contact a été mis à jour";
}else {
    $message = "Le contact n'a pas été mis à jour";
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
    <h1>Mise à jour d'un contact</h1>
    <p><?= $message ?></p>
</body>
</html>
