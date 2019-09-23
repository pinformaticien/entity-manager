<?php


require_once '../src/App/Manager/ContactManager.php';
require_once '../src/App/Entity/Contact.php';

use App\Entity\Contact;
use App\Manager\ContactManager;

$contactManager = new ContactManager();

$contacts = $contactManager->readAll();

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
    <h1>Lister tous les contacts</h1>

    <?php if(empty($contacts)): ?>
        <p>Il n'y a aucun contact à afficher</p>
    <?php else: ?>
        <?php if($contacts === false): ?>
            <p>Une erreur est survernue</p>
        <?php else: ?>
            <ul>
                <?php foreach ($contacts as $contact): ?>
                    <li><?= '#' . $contact->getId() . ' ' . $contact->getPrenom() . ' ' . $contact->getNom() . ' - ' . $contact->getTel() . ' - ' . $contact->getMel() ?> - <a href="form_update_contact.php?id=<?=$contact->getId()?>">Modifier</a><a href="deleteContact.php?id=<?=$contact->getId()?>">Supprimer</a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
