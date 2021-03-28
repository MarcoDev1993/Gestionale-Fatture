

<div>
        <form action="index.php" method="POST">
            Inserimento Fatture <br>
            codice cliente
            <input type="text" name="codcli"> <br>
            numero ordini 
            <input type="number" name="numOrdini" id="numOrdini">
            <br>
            data fattura
            <input type='date' name='dataOrdine'>
            <br>
            codice pagamento
            <input type='text' name='codPag'>
            <br>
            <input type='submit' name='insertOrders' value='Invia'>
        </form>

        <?php

            if (isset($_POST["insertOrders"])) {

            invioInserimentoFattura($conn);
            try {
                echo "<script src=\"./js/ajax.js\"></script>";
            } 
            catch (\Throwable $th) {
            }

            }
            
        ?>

</div>
<script>



</script>

