<?php
require_once('database.php');

//get category name
if (isset($category_id)){
    $category_id= filter_input(INPUT_Get, 'category_id',FILTER_VALIDATE_INT);
    if($category_id== NULL || $category_id == FALSE){
        $category_id =1;
    }
}
// get category name
$queryCategory = 'SELECT * FROM categories WHERE categoryID = :category_id';
$statement1 = $db->prepare($querycategory);
$statement1->bindValue (':category_id', $category_id);
$statement1->execute();
$category= $statement1->fetch();
$category_name = $category ['categoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM categories ORDER BY categoryID';
$statement2 = $db->prepare ($queryAllCategories) ;
$statement2->execute();
$categories=$statement2->fetchAll(); 
$statement2->closeCursor();

// Get Tasks for selected category
$queryTasks = 'SELECT * FROM tasks WHERE CategoryID =: category_id ORDER BY taskID';
$statement3 = $db->prepare($queryTasks);
$statement3->bindValue (':category_id', $category_id);
$statement3->execute();
$tasks = $statement3->fetchAll();
$statement3->closeCursor();
?>

<!DOCTYPE html>
<html>

<!-- head section -->
<head>
    <title>My To Do List</title>
<link rel="stylesheet" href="main.css" />
</head>

<!-- the body section -->
<body>
< header> <h1>Task Manager</h1></header>
<main>
    <h1>Task List</h1>
 
<aside>
    <!-- display a list of categories -->
    <h2>categories</h2> 
    <nav>
    <ul>
        <?php foreach ($categories as $category) : ?>
        <li><a href=" .?category_id=<?php echo $category ['categoryID']; ?>">
        <?php echo $category['categoryName']; ?>
            </a>
        </li>
< ?php endforeach; ?>
</ul>
</nav>
</aside>

< section>
    <!-- display a table of tasks -->
    <h2><?php echo $category_name; ?></h2>
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th class="right " >Price</th>
            <th>&nbsp;</th>
        </tr>

    <?php foreach ($tasks as $task) : ?>
    <tr>
    <td><?php echo $task ['taskCode']; ?></td>
    <td><?php echo $task ['taskName']; ?></td>
    <td class="right"><?php echo $task ['listDuration']; ?></t>
    <td><form action="delete_task.php" method="post">
        <input type="hidden" name="task_id" value="<?php echo $task ['taskID']; ?>">
        <input type="hidden" name="category_id" value="<?php echo $task ['categoryID']; ?>">
        <input type="submit" value="Delete">
            </form></td>
    </tr>
< ?php endforeach; ?>
</table>
<p><a href="add_task_form.php">Add Task</a></p>
</section>
</main>
<footer>
    <p>&copy; <?php echo date ('Y'); ?> My To Do List </p> 
</footer> 
</body> 
</html>