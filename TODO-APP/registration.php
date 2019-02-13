<?php

    session_start();
    
    //walidacja rejestracji 
    if(isset($_POST['email']))
    {  
        $all_true = true;
        //walidacja loginu
        $login = $_POST['user'];
        if((strlen($login)<3) || (strlen($login)>20))
        {
            $all_true = false;
            $_SESSION['e_login'] = "Login musi posiadać od 2 do 20 znaków";
        }

        //walidacja emaila
        $mail = $_POST['email'];
        $email = filter_var($mail, FILTER_SANITIZE_EMAIL);
        if((filter_var($email, FILTER_VALIDATE_EMAIL) == false) || ($email != $mail))
        {
            $all_true = false;
            $_SESSION['e_email'] = 'Podaj prawidłowy adres e-mail';
        }

        //walidacja hasła
        $pwd = $_POST['password'];
        $pwd2 = $_POST['password2'];
        if(strlen($pwd)<8)
        {
            $all_true = false;
            $_SESSION['e_pwdl'] = 'Hasło musi mieć minimum 8 znaków';
        }
        if($pwd != $pwd2)
        {
            $all_true = false;
            $_SESSION['e_pwd'] = 'Hasła nie są identyczne';
        }
        $password = password_hash($pwd, PASSWORD_DEFAULT);
        
        //walidacja regulaminu
        if (!isset($_POST['regulamin'])) {
            $all_true = false;
            $_SESSION['e_regulamin'] = 'Potwierdź akceptację regulaminu';
        }

        //zapamiętuje dane formularza
        $_SESSION['fr_login'] = $login;
        $_SESSION['fr_email'] = $mail;
        $_SESSION['fr_password'] = $pwd;

        //Rejestracja nowego użytkownika
        require_once('connect.php');
        
        

        try {
            $connect = new mysqli($host, $dbuser, $dbpassword, $dbname);
            if($connect->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //email
                
                $rezultat = $connect->query("SELECT id FROM users WHERE email='$mail'");
                if (!$rezultat) throw new Exception($connect->error);
                $emails = $rezultat->num_rows;

                if($emails>0)
                {
                    $all_true = false;
                    $_SESSION['e_email'] = "Ten adres email już jest używany";
                }

                //login
               
                $rezultat = $connect->query("SELECT id FROM users WHERE login_u='$login'");
                if (!$rezultat) throw new Exception($connect->error);
                $logins = $rezultat->num_rows;

                if($logins>0)
                {
                    $all_true = false;
                    $_SESSION['e_login'] = "Ten login jest już używany";
                }

                //koniec walidacji wszyttko jest poprawne
                if($all_true == true)
                {
                    if($connect->query("INSERT INTO users VALUES (NULL, '$login' ,'$mail' ,'$pwd', 1)"))
                    {
                        $_SESSION['ok']='Rejesteracja udana';
						header('Location: form_registration.php');
                    }
                }

            }
        } catch (Exception $e) {
            echo 'Nie udało się połączyć bląd serwera. '.$e;
        }
        

    }