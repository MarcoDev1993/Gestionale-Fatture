

    <?php 
        include "function.php";
        include "./conn/conn.php";
        include "head.php";
        include "header.php";

    ?>

    <?php
        

        if(isset($_POST["log"])){
            $sql_login = "SELECT * FROM utenti WHERE user = '" . $_POST['user'] ."' AND password = '" . $_POST['pass'] . "'";
            $result = $conn->query($sql_login);
            $row = $result->fetch_assoc();
            if (count($row) == 0) {
                echo "<div id='login-error'>Login errato</div>";
            }else{
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['pass'] = $_POST['pass'];
               
                header("Location: http://localhost/FattureTestRefactored/areaRiservata.php");
            }
        }

    ?>
 

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
    
