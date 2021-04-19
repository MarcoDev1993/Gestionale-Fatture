<?php



if (isset($_POST["articoli"])) {
    $sql_insert = "INSERT INTO Articoli (codart ,	desart ,	umis ,	prezzo 	, aliva  ) VALUES('" .  $_POST['codice_articolo'] . "','" .   $_POST['desc_art'] . "', '" .  $_POST['umiart'] . "' ,'" .  $_POST['prezzo'] . "','" .  $_POST['aliva'] . "')";
    $conn->query($sql_insert);
}

?>



    <table class="contenitoreSezionitab" >
        <form action="areaRiservata.php?page=articoliNav" method="POST">

        <tr><td style="height:52px">Inserimento articoli</td></tr>
        <tr>
        <td><input class="inputField" type="text" name="codice_articolo" placeholder="codice articolo"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="desc_art" placeholder="descrizione articolo"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="umiart" placeholder="Unita di misura articolo"> </td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="prezzo" placeholder="prezzo"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="aliva" placeholder="aliquota iva"></td>
        </tr>
        <tr>
        <td><input type="submit" name="articoli" value="Registra Articolo" class="inviaModulo"></td>
        </tr>
        </form>
        </table>


    <?php include "footer.php"; ?>
