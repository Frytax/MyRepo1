<?php
    require_once('connect.php');

    $con = new mysqli($host, $dbuser, $dbpassword, $dbname);

    if (isset($_POST["submit"])) {
        
        $task = $_POST["task"];
        if (empty($task)) {
            $error = "Musisz dodać jakiegoś taska";
        }else{ 
            $con->query(sprintf("INSERT INTO tasks (task) VALUES ('%s')",
            mysqli_real_escape_string($con,$task)));
            header('location: todo.php');
        }
    }

    $tasks = $con->query("SELECT * FROM tasks");

    //delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        $con->query("DELETE FROM tasks WHERE ID=$id");
        header('location: todo.php');
    }  
?>