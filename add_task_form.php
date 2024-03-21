<?php 
require_once('database.php');
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement ->bindValue(':task_id', $task_id);
$statement ->execute();

$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
        <title>My To Do List</title>
        <link rel="stylesheet" href="main.css">
</head>

<body>
    <header><h1>Task manager</h1><header>
        <main>
            <h1>Add Task</h1>
            <form action="add_tast.php" method="post" id="add_task_form">
                <label>Category:</label>
                <select name="category_id">
                    <?php foreach($categories as $category):?>
                        <option value="<?php echo $category['categoryID'];?>">
                        <?php echo $category['categoryName'];?>
                    </option>
                    <?php endforeach; ?>
                    </select><br>
                    <label>Code: </label>
                    <input type="text" name="code"><br>

                    <label>Name: </label>
                    <input type ="text" name="name"><br>

                    <label>duration: </label>
                    <input type ="text" name="duration"><br>

                    <label>&nbsp: </label>
                    <input type ="submit" value="Add Task"><br>
                    </form>
                    <p><a href="index.php">View Task List</a></p>
                    </main>
                    <footer>
                        <p>&copy; <?php echo date('Y'); ?> My To Do List</p>
                    </footer>
                    </body>
                    </html>




]