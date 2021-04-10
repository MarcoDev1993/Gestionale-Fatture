<?php
include "../function.php";
include "../conn/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>

    <?php
        if(isset($_POST["log"])){
            $sql_login = "SELECT * FROM utenti WHERE user = '" . $_POST['user'] ."' AND password = '" . $_POST['pass'] . "'";
            $result = $conn->query($sql_login);
            $row = $result->fetch_assoc();
            if (count($row) == 0) {
                echo "Nome utente o password incorretti";
            }else{
                echo "Login avvenuto";
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['pass'] = $_POST['pass'];

                //header("location: ../index.php");
            }
        }

    ?>
    <div id="header">
        Gestionale Fatture
    </div>

    <div id="login">
        <table id="login-form" class="contenitoreSezionitab">
        <form action="login.php" method="POST">
        <tr>
        <td><input class="inputField" type="text" name="user" placeholder="Username" /></td>
        </tr>

        <tr>
        <td><input class="inputField" type="text" name="pass" placeholder="Password"></td>
        </tr>

        <tr>
        <td><input id="loginBtn" type="submit" name="log" value="Login"></td>
        </tr>

        </form>
        </table>
    </div>
    
</body>
</html>