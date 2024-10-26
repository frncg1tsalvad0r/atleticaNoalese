<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Atleta</title>
</head>
<body>
    <?php
        $conn = mysqli_connect("127.0.0.1", "root", "", "atleticanoalese");


        if(isset($_POST['conferma'])) {
            $sql = "UPDATE atleti 
                        SET 
                        nome = '$_POST[nome]',
                        cognome = '$_POST[cognome]',
                        numeroTessera = $_POST[numeroTessera],
                        sesso = '$_POST[sesso]',
                        categoria = '$_POST[categoria]',
                        dataNascita = '$_POST[dataNascita]',
                        registrato = $_POST[registrato] WHERE ID = $_POST[ID]";
                // print_r($sql); die();
                mysqli_query($conn, $sql);
                header("Location: visualizzaAtleti.php");
                die();
        }

        $sql = "SELECT * FROM atleti WHERE ID = $_POST[selezione]";
        $atleti = mysqli_query($conn, $sql); 
        $atleta = mysqli_fetch_assoc($atleti);
        //print_r($atleta); die();

    ?>
    <h1>Modifica Atleta</h1>
    <form action="modificaAtleta.php" method="POST">
        ID: <input type="text" name="ID" readonly value = "<?php echo $atleta['ID']; ?>"><br><br>
        NOME: <input type="text" name="nome" value = "<?php echo $atleta['nome']; ?>"><br><br>
        COGNOME: <input type="text" name="cognome" value = "<?php echo $atleta['cognome']; ?>"><br><br>
        NUMERO TESSERA: <input type="number" name="numeroTessera" value = "<?php echo $atleta['numeroTessera']; ?>"><br><br>
        SESSO: 
            M:<input type="radio" name="sesso" value='M' <?php if($atleta['sesso'] == 'M') echo 'checked'; ?>>
            F:<input type="radio" name="sesso" value='F' <?php if($atleta['sesso'] == 'F') echo 'checked'; ?>><br><br>
        CATEGORIA: 
        <select name="categoria">
            <option value="ragazzo" <?php if($atleta['categoria'] == 'ragazzo') echo 'selected'; ?> >ragazzo</option>
            <option value="cadetto" <?php if($atleta['categoria'] == 'cadetto') echo 'selected'; ?> >cadetto</option>
            <option value="allievo" <?php if($atleta['categoria'] == 'allievo') echo 'selected'; ?>>allievo</option>
            <option value="juniores" <?php if($atleta['categoria'] == 'juniores') echo 'selected'; ?>>juniores</option>
            <option value="promessa" <?php if($atleta['categoria'] == 'promessa') echo 'selected'; ?>>promessa</option>
            <option value="senior" <?php if($atleta['categoria'] == 'senior') echo 'selected'; ?>>senior</option>
            
        </select><br><br>
        DATA NASCITA: <input type="date" name="dataNascita" value = "<?php echo $atleta['dataNascita']; ?>"><br><br>
        <!-- REGISTRATO:<input type="checkbox" name="registrato" value = "1" checked><br><br> -->
        <input type="hidden" name="registrato" value="0">
        REGISTRATO: <input type="checkbox" name="registrato" value = "1" <?php if($atleta['registrato'] == 1) echo 'checked'; ?> ><br><br>
        <input type="submit" name="conferma" value="Conferma"><br><br>
    </form>

</body>
</html>