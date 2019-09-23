<?php


namespace App\Manager;

use PDO;
use App\Entity\Contact;

class ContactManager
{
    /**
     * @var \PDO $pdo
     */
    private $pdo;


    /**
     * @var \PDOStatement $pdoStatement
     */
    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=agenda', 'root', '');
    }

    /**
     * @param Contact $contact
     *
     * @return bool
     */
    private function create(Contact &$contact)
    {
        $this->pdoStatement = $this->pdo->prepare('INSERT INTO contact VALUES (NULL, :nom, :prenom, :tel, :mel)');

        $this->pdoStatement->bindValue(':nom', $contact->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':prenom', $contact->getPrenom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':tel', $contact->getTel(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mel', $contact->getMel(), PDO::PARAM_STR);

        $executeIsOk = $this->pdoStatement->execute();

        if (!$executeIsOk) {
            return false;
        } else {
            $id = $this->pdo->lastInsertId();
            $contact = $this->read($id);

            return true;
        }
    }


    /**
     * @param int $id
     *
     * @return bool|Contact|null
     */
    public function read($id)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM contact WHERE id = :id');
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            $contact = $this->pdoStatement->fetchObject('App\Entity\Contact');

            if ($contact === false)
            {
                return null;
            } else {
                return $contact;
            }
        } else {
            return false;
        }
    }

    /**
     * @return array|bool
     */
    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query('SELECT * FROM contact ORDER BY nom, prenom');

        $contacts = [];

        while ($contact = $this->pdoStatement->fetchObject('App\Entity\Contact'))
        {
            $contacts[] = $contact;
        }
        return $contacts;
    }


    /**
     * @param Contact $contact
     *
     * @return bool
     */
    private function update(Contact $contact)
    {
        $this->pdoStatement = $this->pdo->prepare('UPDATE contact SET nom=:nom, prenom=:prenom, tel=:tel, mel=:mel WHERE id=:id LIMIT 1');
        $this->pdoStatement->bindValue(':nom', $contact->getNom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':prenom', $contact->getPrenom(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':tel', $contact->getTel(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mel', $contact->getMel(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id', $contact->getId(), PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    /**
     * @param Contact $contact
     *
     * @return bool
     */
    public function delete(Contact $contact)
    {
        $this->pdoStatement = $this->pdo->prepare('DELETE FROM contact WHERE id=:id LIMIT 1');
        $this->pdoStatement->bindValue(':id', $contact->getId(), PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    /**
     * @param Contact $contact
     *
     * @return bool
     */
    public function save(Contact &$contact)
    {
        if (is_null($contact->getId()))
        {
           return $this->create($contact);
        } else {
            return $this->update($contact);
        }
    }


}