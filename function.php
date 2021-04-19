<?php


function getCodeArticles($conn){
    $conn = mysqli_connect("localhost", "root", "", "TEST");
    $sql = "SELECT codart FROM articoli";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['codart'] . "'>" . $row['codart'] ."</option>";
      }
    } 
}


function getArticles($conn){
    $sql = "SELECT desart FROM articoli";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['desart'] . "'>" . $row['desart'] ."</option>";
      }
    } 
    
}

function getClienti(){
    $conn = mysqli_connect("localhost", "root", "", "TEST");
    $sql = "SELECT clienti.codice AS cod FROM clienti";
    echo $sql;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['cod'] . "'>" . $row['cod'] ."</option>";
        
      }
    } 
}

function getNumeroFatture($conn){
  $sql = "SELECT FAT_NUM FROM fattura_m";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['FAT_NUM'] . "'>" . $row['FAT_NUM'] ."</option>";
      }
    } 
}


// VISUALIZZAZIONE DATI FATTURE
function stampaTBody($conn){
  if (isset($_POST['numFattura'])) {
    $numRighe = getRigheFattura($conn, $_POST['numFattura']);
    $dati = getDatiRigheFattura($conn, $_POST['numFattura']);               
    $datiFatturaM = getDatiRigheFatturaM($conn, $_POST['numFattura']);
    $datiFatturaM = explode(',' , $datiFatturaM[0]);
    echo "<table class='contenitoreSezionitab'><thead><tr><th>Codice articolo</th><th>Descrizione articolo</th><th>Quantità</th><th>Prezzo</th><th>Iva 22%</th><th>Importo</th></tr></thead><tbody>";    
    for ($i=0; $i < $numRighe; $i++) { 
        $datiRIGA = explode(',', $dati[$i]);
        echo 
        "<tr>
            <td> " . $datiRIGA[0] . "</td>
            <td> " . $datiRIGA[1] . "</td>
            <td>" . $datiRIGA[2] . "</td>
            <td>" . $datiRIGA[3] . "</td>
            <td>" . $datiRIGA[4] . "</td>
            <td>" . $datiRIGA[5] . "</td>
        </tr>";
    }
    echo 
    "<tr><td></td><td></td><td></td><td>".$datiFatturaM[3]."</td><td> ".$datiFatturaM[4]."</td><td> ".$datiFatturaM[5]."</td></tr>";
    echo "</tbody></table>"; 
}
}


function getRigheFattura($conn, $numFattura){
  $sql = "SELECT COUNT(fat_riga) AS numRighe FROM fattura_r WHERE fat_num = " . $numFattura;
  $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      return $row['numRighe'];
    }
}

function getDatiRigheFattura($conn, $numFattura){
  $sql = "SELECT * FROM fattura_r WHERE fat_num = " . $numFattura;
  $result = $conn->query($sql);
  $index = 0;
  while($row = $result->fetch_assoc()) {
     $dati[$index] = 
     $row['fat_codart'] . "," .
     $row['fat_desart'] . "," .
     $row['fat_umis'] . "," .
     $row['fat_prezzo'] . "," .
     $row['fat_aliva'] . "," .
     $row['fat_importo'];
     $index++;
  }
  return $dati;
}


function getDatiRigheFatturaM($conn, $numFattura){
  $sql = "SELECT * FROM fattura_m WHERE fat_num = " . $numFattura;
  $result = $conn->query($sql);
  $index = 0;
  while($row = $result->fetch_assoc()) {
     $dati[$index] = 
     $row['FAT_DATA'] . "," .
     $row['FAT_CODICE'] . "," .
     $row['FAT_CODPAG'] . "," .
     $row['FAT_TOTIMP'] . "," .
     $row['FAT_TOTIVA'] . "," .
     $row['FAT_TOTALE'];
     $index++;
  }
  return $dati;
}


//INSERIMENTO FATTURE
// funzioni richiamate in insertFatture.php
function invioInserimentoFattura($conn){
  if (isset($_POST["insertOrders"])) {
    //session_start();
    $_SESSION['codcli'] = $_POST["codcli"];
    $_SESSION["dataOrdine"] = $_POST["dataOrdine"];
    $_SESSION["codPag"] = $_POST["codPag"];
    getFormOrders($conn);
}
}

function getFormOrders($conn){
  if (isset($_POST['insertOrders'])) {
    $ordine = $_POST['numOrdini'];
    echo "<div id='contenitoreForm'>";
    for ($i=1; $i < $ordine+1; $i++) {
        echo "<div id='" . $i . "'>
        <form  method='POST'>                  
        <fieldset> 
        <legend>
            Ordine" . $i . "
        </legend>  
            <label for='select_desc'>Descrizione Articolo</label>
                <select class='select_desc' name='select_desc[]' id=". $i . ">";
                    echo '<option></option>';  
                    getArticles($conn);
                echo "</select>
                <br>
            <label for='qtaArt'>Unità di misura</label>
                <input class='qtaArt' type='number' name='qtaArt[]' > <br>
        </fieldset></div>";
    }
    echo "<input type='button' name='insertFattura' id='insertFattura' value='Inserisci ordini' />";
    echo "</div>";
    //echo "<input type='submit' name='insertFattura' value='Inserisci ordini' />";             // per passaggio dati senza ajax mettere al form action=inserimento.php
    echo "</form>";
    }
}
// funzioni richiamate in inserimento.php
function getNumFattura(){
  $conn = new mysqli("localhost", "root", "", "TEST");
    $sql_FATNUM = "SELECT COUNT(FAT_NUM) AS numeroFattura FROM fattura_m ";
    $result = $conn->query($sql_FATNUM);
    while($row = $result->fetch_assoc()) {
        $numfat = $row["numeroFattura"]+1;
        return $numfat;
    }
}

function getCodArt($descArt){
  $conn = new mysqli("localhost", "root", "", "TEST");
  $sql_codart = "SELECT codart FROM articoli WHERE desart = '" . $descArt . "'";
  $result = $conn->query($sql_codart);
  while($row = $result->fetch_assoc()) {
      $codArt = $row["codart"];
      return $codArt;
  }
}

function getPrezzo($descArt){
  $conn = new mysqli("localhost", "root", "", "TEST");
  $sql_p = "SELECT prezzo FROM articoli WHERE desart = '" . $descArt . "'";
  $result = $conn->query($sql_p);
  while($row = $result->fetch_assoc()) {
      $prezzo = $row["prezzo"];
  }
  return $prezzo;
}



?>