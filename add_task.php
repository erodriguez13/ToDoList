<?php
//Get the task information
$category_id = filter_input(INPUT_POST, 'catgory_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$duration = filter_input(INPUT_POST, 'duraction', FILTER_VALIDATE_INT);

//validate inputs
if($caterogy_id == NULL || $category_id==FALSE || $code == NULL || $name == NULL || $duration== NULL || $duration == FALSE){
$error = "Invalid task data. Check all fields and try again.";
include ('error.php');
}else {
    require_once ('database.php');

//Add task to db
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':duration', $duration);
$statement-> execute();
$statement->closeCursor();

//Display the Task list page
include('index.php');

}
?>