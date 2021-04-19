<?php

if (isset($_GET["logout"])) {
        session_destroy();
        unset($_GET);
        header("Location: http://localhost/FattureTestRefactored/index.php");
    }
?>

<script src="./js/effect.js"></script>


<script>
/*
    document.addEventListener('DOMContentLoaded', function(){
        var logout = document.getElementById("logoutBtn");
        console.log(logout);
        logout.addEventListener("click", function(){
        console.log("ciao");
        var r = new XMLHttpRequest();
        r.open("GET", "footer.php", true);
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        r.send("logout=" + true);
        r.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        window.location.href = this.responseText;
        }
        };
       
    });
    });
*/
    
    
    
</script>

<footer class="footer">
    <form action="footer.php">
    <input id="logoutBtn" type="submit" value="Logout" name="logout">
    </form>

</footer>

</body>

</html>

