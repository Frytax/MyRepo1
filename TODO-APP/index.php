<?php require_once('add_task.php') ?>

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
            <?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td class="task"><?php echo $row ['task']; ?></td>
                        <td class="delete">
                            <a href="index.php?del_task=<?php echo $row ['ID']; ?>">X</a>
                        </td>
                    </tr>
                <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>