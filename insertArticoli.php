<?php



if (isset($_POST["articoli"])) {
    $sql_insert = "INSERT INTO Articoli (codart ,	desart ,	umis ,	prezzo 	, aliva  ) VALUES('" .  $_POST['codice_articolo'] . "','" .   $_POST['desc_art'] . "', '" .  $_POST['umiart'] . "' ,'" .  $_POST['prezzo'] . "','" .  $_POST['aliva'] . "')";
    $conn->query($sql_insert);
}

?>

<form action="index.php" method="POST">
        Inserimento articoli <br>

        codice articolo
        <input type="text" name="codice_articolo"> <br>
        descrizione articolo 
        <input type="text" name="desc_art"><br>
        unita di misura articolo
        <input type="text" name="umiart"> <br>
        prezzo 
        <input type="decimal" name="prezzo"><br>
        aliquota iva
        <input type="text" name="aliva"> <br>
       

        <input type="submit" name="articoli" value="invia">

    </form>


    <br><br><br>
