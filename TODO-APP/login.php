<?php


    require_once('connect.php');

    $connect = new mysqli($host, $dbuser, $dbpassword, $dbname);

    if($connect->connect_errno!=0)
    {
        echo 'Błąd serwera: '.$connect->connect_errno;
    }
    else
    {
        $login = $_POST['user'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");
        
        if ($sql_query = $connect->query(
        sprintf("SELECT * FROM users WHERE login_u='%s' AND password_u='%s'",
        mysqli_real_escape_string($connect,$login),
        mysqli_real_escape_string($connect,$password))))
        {
            $users = $sql_query->num_rows;
            
            if($users>0)
            {
                $_SESSION['login_true'] = true;

                $row = $sql_query->fetch_assoc();
                $_SESSION['name_u'] = $row['login_u'];

                unset($_SESSION['error']);
                $sql_query->free_result();
                header('location: todo.php');
            }
            else
            {
                $_SESSION['error'] = 'Nieprawidłowy login lub hasło';
                header('location: index.php');
            }
        }

        $connect->close();
        

    }


?>