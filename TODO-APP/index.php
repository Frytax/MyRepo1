<?php
    //connect database

    $con = mysqli_connect('localhost', 'root', '', 'todolist');

    if (isset($_POST["submit"])) {
        
        $task = $_POST["task"];
        if (empty($task)) {
            $error = "Musisz dodać jakiegoś taska";
        }else{    
            mysqli_query($con, "INSERT INTO tasks (task) VALUES ('$task')");
            header('location: index.php');
        }
    }

    $tasks = mysqli_query($con, "SELECT * FROM tasks");

    //delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($con, "DELETE FROM tasks WHERE ID=$id");
        header('location: index.php');
    }
    


?>
<!DOCTYPE html>
<html>
<head>
    <title>TODO list</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>TODO list application</h2>
    </div>

    <?php 
        if (isset($error)) { ?>
        <p><?php echo $error ?></p>    
    <?php  } ?>

    <form method="POST" action="index.php">

        <input type="text" name="task" class="task_input" placeholder="Task...">
        <button type="submit" name="submit" class="task_btn" >Add Task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nr</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>


        <tbody>
            <?php while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td><?php echo $row ['ID']; ?></td>
                        <td class="task"><?php echo $row ['task']; ?></td>
                        <td class="delete">
                            <a href="index.php?del_task=<?php echo $row ['ID']; ?>">X</a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>

    </table>
</body>
</html>