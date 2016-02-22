
<?php 


require  'medoo.php';


$db = new medoo(array(
    'database_type' => 'mysql',
    'database_name' => 'tasks',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root'
));

if(isset($_POST["id"]) || strlen($_POST["task"])){
$id = $_POST["id"];
$task = $_POST["task"];



$whichtask = $_POST["whichtask"];
switch($whichtask) {

case "add":
$task = $db->insert("task", ["task" => $task,"done" => false]);
break;

case "delete":
$task = $db->delete("task", ["id" => $id]);
break;

case "done":
$task = $db->update("task", ["done"=> true], ["id" => $id]);
break;

case "undo":
$task = $db->update("task", ["done"=> false], ["id" => $id]);

}

}
header('Location: index.php');

 ?>