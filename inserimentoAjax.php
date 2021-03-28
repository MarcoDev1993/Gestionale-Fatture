<?php
include "function.php";


// inserimento fattura
//if (isset($_POST["insertFattura"])) {
    $conn = new mysqli("localhost", "root", "", "TEST");
    session_start();
    $numfat = getNumFattura();
    $codcli = $_SESSION['codcli'];
    $data = $_SESSION["dataOrdine"];
    $codPag = $_SESSION["codPag"];




    $descr = $_POST["select_desc"];    
    $desc = explode(",", $descr);

    $qt = $_POST["qtaArt"];
    $qta = explode(",", $qt);
    
    



    //righe ordini
    if(isset($desc) && isset($qta)){
        $tot_imp = 0;
        $tot_iva = 0;
        for ($i=0; $i < count($desc); $i++) {
            // eseguo insert in fattura righe
            $codArt = getCodArt($desc[$i]);
            $prezzoArt = getPrezzo($desc[$i]);
            $iva = ($prezzoArt * 22) / 100 ;
            $imp = $prezzoArt + $iva;
            $sql_insertR = "INSERT INTO fattura_r (fat_num,fat_riga,fat_codart,fat_desart,fat_umis,fat_prezzo,fat_importo,fat_aliva) VALUES('" .  $numfat . "','" .   $i . "', '" .  $codArt . "' ,'" .  $_POST['select_desc'][$i] . "','" . $qta[$i] . "','" .  $prezzoArt . "','" .  $imp . "','" .  $iva . "')";
            $conn->query($sql_insertR);
            /**************************************/
            //select prezzo articolo
            $sql_FATNUM = "SELECT prezzo FROM articoli WHERE desart = '" . $desc[$i] . "'";
            $result = $conn->query($sql_FATNUM);
            while($row = $result->fetch_assoc()) {
                $prezzo = $row["prezzo"];
            }
            $tot_imp  += ($qta[$i] * $prezzo * 122) / 100;
            $tot_iva += ($qta[$i] * $prezzo * 22) / 100;
            /***********************/
        }
        $tot_fatt = $tot_imp + $tot_iva;
        $sql_insertM = "INSERT INTO fattura_m (FAT_NUM	,FAT_DATA, FAT_CODICE, FAT_CODPAG, FAT_TOTIMP, FAT_TOTIVA, FAT_TOTALE) VALUES('" .  $numfat . "','" .   $data . "', '" .  $codcli . "' ,'" .  $codPag . "','" .  $tot_imp . "','" .  $tot_iva . "','" .  $tot_fatt . "')";
        $conn->query($sql_insertM);
        echo "Inserimento fattura avvenuto con successo";
    }
    session_unset();
//}

?>