<?php 
require_once('database.php');
$task_id = filter_input(INPUT_POST, 'task_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
//delete a task from the data base
if($task_id !=FALSE && $category_id !=FALSE){
    $query='DELETE FROM tasks WHERE taskID = :task_id';
    $statement = $db->prepare($quuery);
    $statement->bindValue(':task_id', $task_id);
    $success = $statement->execute();
    $statement->closeCursor();
}
