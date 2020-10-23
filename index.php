<?php

$connection = require_once './Connection.php';

$note = $connection->getNotes();

$currentNote = [
    'id' => '',
    'title' => '',
    'description' => ''
];

if (isset($_GET['id'])){
    $currentNote = $connection->getNoteById($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="note.css">
    
</head>
<body>
<div>
    <center><h1>MY DAILY NOTES</h1></center>
      
    <form class="new-note" action="save.php" method="post">
        <input type="hidden" name="color" val="" id="color">
        <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>">
        <input type="text" name="title" placeholder="Note title"
               autocomplete="off" value="<?php echo $currentNote['title'] ?>">
        <textarea name="description" cols="30" rows="4" placeholder="Note Description"
        ><?php echo $currentNote['description'] ?></textarea>
     
        <button id="btn-save">
           <?php if ($currentNote['id']): ?>
                Update Note  
            <?php else: ?>
                New Note       
            <?php endif; ?>
        </button>
    </form>
       
    <div id="notes">
    <?php foreach ($note as $note): ?>
        <div id="note">  
            <div class="title" >
                <a href="?id=<?php echo $note['id'] ?>"><?php echo $note['title'] ?> </a>
            </div>
            <div class="description">
            <?php echo $note['description'] ?>
            </div>
            
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $note['id'] ?> ">
                <button class="close">X</button>
            </form>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script type='text/javascript' src='note.js'></script>
     
</body>

</html>
