<?php
$conn = mysqli_connect("localhost", "root", "", "TEST");

if (isset($_POST["clienti"])) {
    $sql_insert = "INSERT INTO Clienti (codice ,	ragsoc, 	indi ,	cap ,	citta ,	prov ,	cfiscale ,	piva ,	codpag ) VALUES('" .  $_POST['codice_cliente'] . "','" .   $_POST['codice_cliente'] . "','" .  $_POST['rag_soc'] . "','" .  $_POST['indi'] . "','" .  $_POST['cap'] . "','" .  $_POST['prov'] . "','" . $_POST['cfiscale'] . "','" .  $_POST['piva'] . "','" . $_POST['codpag'] . "')";
    $conn->query($sql_insert);
}

?>

<form action="index.php" method="POST">
        Inserimento clienti <br>

        codice cliente
        <input type="text" name="codice_cliente"> <br>
        rag soc 
        <input type="text" name="rag_soc"><br>
        indi
        <input type="text" name="indi"> <br>
        cap 
        <input type="text" name="cap"><br>
        citta
        <input type="text" name="citta"> <br>
        prov 
        <input type="text" name="prov"><br>
        cfiscale 
        <input type="text" name="cfiscale"><br>
        piva 
        <input type="text" name="piva"><br>
        codpag 
        <input type="text" name="codpag"> <br>

        <input type="submit" name="clienti" value="invia">

    </form>

    <br><br><br>
