<?php require_once('registration.php')?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register - ToDo</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
    <div class="container">
        <span><h2>Register ToDo aplication!</h2></span>
        <form method="POST">
            <!-- login -->
            <span>Login:</span><input type="text" name="user" placeholder="Login" onfocus="this.placeholder=''" onblur="this.placeholder='Login'"
                value="<?php
                    if (isset($_SESSION['fr_login']))
                    {
                        echo $_SESSION['fr_login'];
                        unset($_SESSION['fr_login']);
                    }
                ?>"
                />
                <!--Wyświetlanie komunikatu walidacji-->
            <?php 
                if(isset($_SESSION['e_login']))
                {
                    echo '<span class = error>'.$_SESSION['e_login'].'</span>';
                    unset($_SESSION['e_login']);
                }
            ?>
            <!-- email -->
            <span>E-mail:</span><input type="text" name="email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'"
            value="<?php
                if (isset($_SESSION['fr_email'])) 
                {
                    echo $_SESSION['fr_email'];
                    unset($_SESSION['fr_email']);
                }
            ?>"
            />
             <!--Wyświetlanie komunikatu walidacji-->
            <?php 
                if(isset($_SESSION['e_email']))
                {
                    echo '<span class = error>'.$_SESSION['e_email'].'</span>';
                    unset($_SESSION['e_email']);
                }
            ?>
            <!-- hasło -->
            <span>Password:</span><input type="password" name="password" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"
            value="<?php
                if (isset($_SESSION['fr_password'])) 
                {
                    echo $_SESSION['fr_password'];
                    unset($_SESSION['fr_password']);
                }
            ?>"
            />
             <!--Wyświetlanie komunikatu walidacji-->
            <?php 
                if(isset($_SESSION['e_pwdl']))
                {
                    echo '<span class = error>'.$_SESSION['e_pwdl'].'</span>';
                    unset($_SESSION['e_pwdl']);
                }
            ?>
            <!-- powtórzenie hasła -->
            <span>Repeat password:</span><input type="password" name="password2" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'"/>
             <!--Wyświetlanie komunikatu walidacji-->
            <?php 
                if(isset($_SESSION['e_pwd']))
                {
                    echo '<span class = error>'.$_SESSION['e_pwd'].'</span>';
                    unset($_SESSION['e_pwd']);
                }
            ?>
            <!-- regulamin -->
            <span><input type="checkbox" name="regulamin">I accept the terms and conditions</span>
             <!--Wyświetlanie komunikatu walidacji-->
            <?php 
                if(isset($_SESSION['e_regulamin']))
                {
                    echo '<span class = error>'.$_SESSION['e_regulamin'].'</span>';
                    unset($_SESSION['e_regulamin']);
                }
            ?>
           

            <div class="g-recaptcha" data-sitekey="6LdVFJEUAAAAAJt3rB274mVyKfkGrfZTgbl6sYZT"></div>
            <input type="submit" value="Register"/>
        </form>
        
    </div>
</body>
</html>