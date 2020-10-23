<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
       $this->pdo = new PDO('mysql:server=localhost;dbname=notes', 'root', '');
       $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getNotes()
    {
        $statement = $this->pdo->prepare("SELECT * FROM note ORDER BY description DESC");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNote ($note)
    {
        $statement = $this->pdo->prepare("INSERT INTO note (title, description)
                                        VALUES (:title, :description)");
        $statement->bindValue('title', $note['title']);
        $statement->bindValue('description', $note['description']);
        
        return $statement->execute();
    }

    public function getNoteByid($id)
    {
         $statement = $this->pdo->prepare("SELECT * FROM note WHERE id = :id");
         $statement->bindValue('id', $id);
         $statement->execute();
         return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateNote ($id, $note)
    {
          $statement = $this->pdo->prepare("UPDATE note SET title = :title, description = :description WHERE id = :id");
          $statement->bindValue('id', $id);
          $statement->bindValue('title', $note['title']);
          $statement->bindValue('description', $note['description']);
          return $statement->execute();
    }

    public function removeNote($id){
        $statement = $this->pdo->prepare("DELETE FROM note WHERE id = :id");
        $statement->bindValue('id', $id);
        return $statement->execute();
    }

}

return new Connection();

?>