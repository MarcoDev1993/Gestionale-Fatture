
    <form action="?page=vistaFattureNav" method="POST" id="form">
        <label for="">
            Numero fattura
        </label>
        <select name="numFattura" id="numFattura">
            <option value=""></option>
            <?php getNumeroFatture($conn); ?>
        </select>
    </form>

    <?php stampaTBody($conn); ?>


    <script src="./js/view.js"></script>
