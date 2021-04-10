

<div>   
        <table class="contenitoreSezionitab">
        <form action="index.php?page=fattureNav" method="POST">
            <tr><td colspan=2>Inserimento Fatture</td></tr>
            <tr>
               
                <td><input class="inputField" type="text" name="codcli" placeholder="Codice cliente"></td>
            </tr>
            <tr>
                <td><input class="inputField" type="number" name="numOrdini" id="numOrdini" placeholder="Numero ordini"></td>
            </tr>
            <tr>
                <td style="height:78px" >
                        <div style="margin: 0 auto; width:519px; height:10%; text-align: left; font-size:11px">Data fattura</div>
                        <input class="inputField" type='date' name='dataOrdine' />                  
                </td>
            </tr>
            <tr>
                <td>
                    <input class="inputField" type='text' name='codPag' placeholder="Codice pagamento">
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type='submit' name='insertOrders' value='Registra fattura' id="registra">
                </td>
            </tr>
        </form>
        </table>

        <?php

            if (isset($_POST["insertOrders"])) {

            invioInserimentoFattura($conn);
            try {
                echo "<script src=\"./js/insert.js\"></script>";
            } 
            catch (\Throwable $th) {
            }

            }
            
        ?>

</div>


