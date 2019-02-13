<?php
    require_once "connect.php";

    $con = new mysqli($host, $dbuser, $dbpassword, $dbname);

    if (isset($_POST["submit"])) {
        
        $task = $_POST["task"];
        if (empty($task)) {
            $error = "Musisz dodać jakiegoś taska";
        }else{ 
            mysqli_query($con,sprintf("INSERT INTO tasks (task) VALUES ('%s')",
            mysqli_real_escape_string($con,$task)));
            header('location: todo.php');
        }
    }

    $tasks = mysqli_query($con, "SELECT * FROM tasks");

    //delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($con, "DELETE FROM tasks WHERE ID=$id");
        header('location: todo.php');
    }  
?>