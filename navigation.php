

<div id="nav">
    <div id="ancoreMenu">
    
    <a class="nav" href="?page=fattureNav">
        Inserisci Fatture
    </a>
    <a class="nav" href="?page=vistaFattureNav">
        Fatture emesse
    </a>
    <a class="nav" href="?page=clienteNav">
        Clienti
    </a>
    <a class="nav" href="?page=articoliNav">
        Articoli
    </a>
    </div>

    
</div>

<div id="contenitoreSezioni">
<?php 
    if (!isset($_GET['page'])) {
        include "footer.php";
    } else {
    switch ($_GET['page']) {
        case "homeNav":
             include "footer.php";
        break;
        case "fattureNav":
             include "insertFatture.php";
        break;
        case "clienteNav":
             include "insertClienti.php";
        break;
        case "articoliNav":
             include "insertArticoli.php";
        break;
        case "vistaFattureNav":
            include "viewFatture.php";
       break;
        default:
        
        };
    }
?>

</div>