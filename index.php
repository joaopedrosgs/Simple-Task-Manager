<?php 
   require  'medoo.php';
   require 'config.php';
   
   $tasks = $db->select("task", "*", ["ORDER" => "id DESC"]);
    
   
    
   
   
    ?>
<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>TaskManger</title>
      <link rel="stylesheet" href="css/css.css">
      <link rel="author" href="humans.txt">
   </head>
   <body>
      <div class="header">
         <div class="hwrapper">
            <div class="big"><a href="index.php">MY TASKS</a></div>
         </div>
         <form action="actions.php" method="post" class="formadd">
            <input id="task" name="task" class="taskname" ></input>
            <input id="whichtask" name="whichtask" type="hidden"  value="add" >
         </form>
      </div>
      </div>
      <div class="body">
         <ul class="tasks">
            <?php   		
               foreach($tasks as $task)
               {
               
               	echo "<form action='actions.php' method='post'><input name='id' id='id' type='hidden' value=".$task['id']."> ";
               
               
               
               	echo "<li class='task'><button type='submit'  name='whichtask' id='whichtask' value='";
               
               
               if($task["done"])
               {
               	echo "undo";
               }
               else {echo "done";}
               
               
               echo	"' class='";
               if($task["done"]) {
                echo "done";
               }
               	else {
               		echo "todo";
               	}
               
               	echo "'></button>".$task["task"]."  <button  name='whichtask' id='whichtask' value='delete' class='delete'></button>   </li>";
               
               	echo "</form>";
               }
               
               
               
               
               
               
               
                ?>
         </ul>
      </div>
   </body>
</html>