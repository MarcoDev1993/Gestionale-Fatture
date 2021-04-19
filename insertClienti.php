<?php
$conn = mysqli_connect("localhost", "root", "", "TEST");

if (isset($_POST["clienti"])) {
    $sql_insert = "INSERT INTO Clienti (codice ,	ragsoc, 	indi ,	cap ,	citta ,	prov ,	cfiscale ,	piva ,	codpag ) VALUES('" .  $_POST['codice_cliente'] . "','" .   $_POST['codice_cliente'] . "','" .  $_POST['rag_soc'] . "','" .  $_POST['indi'] . "','" .  $_POST['cap'] . "','" .  $_POST['prov'] . "','" . $_POST['cfiscale'] . "','" .  $_POST['piva'] . "','" . $_POST['codpag'] . "')";
    $conn->query($sql_insert);
}

?>

        <table class="contenitoreSezionitab" >
        <form action="areaRiservata.php?page=clienteNav" method="POST">

        <tr><td style="height:52px">Inserimento clienti</td></tr>
        <tr>
        <td><input class="inputField" type="text" name="codice_cliente" placeholder="Codice Cliente"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="rag_soc" placeholder="Ragione Sociale"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="indi" placeholder="Indirizzo"> </td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="cap" placeholder="Cap"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="citta" placeholder="Città"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="prov" placeholder="Provincia"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="cfiscale" placeholder="Codice fiscale"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="piva" placeholder="Partita iva"></td>
        </tr>
        <tr>
        <td><input class="inputField" type="text" name="codpag" placeholder="Codice pagamento"></td>
        </tr>
        <tr>
        <td><input type="submit" name="clienti" value="Registra Cliente" class="inviaModulo"></td>
        </tr>
        </form>
        </table>
   

    <?php include "footer.php"; ?>
