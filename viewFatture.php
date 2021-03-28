<?php

include "function.php";
include "./conn/conn.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fatture</title>


    <form action="viewFatture.php" method="POST" id="form">
        <label for="">
            Numero fattura
        </label>
        <select name="numFattura" id="numFattura">
            <option value=""></option>
            <?php getNumeroFatture($conn); ?>
        </select>
    </form>
    

    
    <table border='1'>
    <thead>
        <tr>
            <th>
                Codice articolo
            </th>
            <th>
                Descrizione articolo
            </th>
            <th>
                Quantità
            </th>
            <th>
                Prezzo
            </th>
            <th>
                Iva 22%
            </th>
            <th>
                Importo
            </th>
        </tr>
    </thead>
    <tbody>
        <?php 
            stampaTBody($conn);
        ?>
    </tbody>
    </table>

        <script>
    
            function submitEvent(){
                var select = document.getElementById("numFattura");
                select.addEventListener("change", (e)=>{
                e.target.parentElement.submit();
            });
            }
            document.addEventListener('DOMContentLoaded', submitEvent(), false); 

            
        </script>
</body>
</html>