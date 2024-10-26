<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci Atleta</title>
</head>
<body>
    <?php
        if(isset($_POST['inserisci'])) {
            $sql = "INSERT INTO atleti (
                        nome,
                        cognome,
                        numeroTessera,
                        sesso,
                        categoria,
                        dataNascita,
                        registrato
                    )  
                    VALUES (
                        '$_POST[nome]',
                        '$_POST[cognome]',
                        $_POST[numeroTessera],
                        '$_POST[sesso]',
                        '$_POST[categoria]',
                        '$_POST[dataNascita]',
                        $_POST[registrato]
                    )";
                $conn = mysqli_connect("127.0.0.1", "root", "", "atleticanoalese");
                mysqli_query($conn, $sql);
                header("Location: visualizzaAtleti.php");
        }
    ?>
    <h1>Inserisci Atleta</h1>
    <form action="inserisciAtleta.php" method="POST">
        <!-- ID: <input type="number" name="ID"><br><br> -->
        NOME: <input type="text" name="nome"><br><br>
        COGNOME: <input type="text" name="cognome"><br><br>
        NUMERO TESSERA: <input type="number" name="numeroTessera"><br><br>
        SESSO: 
            M:<input type="radio" name="sesso" value='M'>
            F:<input type="radio" name="sesso" value='M'><br><br>
        CATEGORIA: 
        <select name="categoria">
            <option value="ragazzo">ragazzo</option>
            <option value="cadetto">cadetto</option>
            <option value="allievo">allievo</option>
            <option value="juniores">juniores</option>
            <option value="promessa">promessa</option>
            <option value="senior">senior</option>
            
        </select><br><br>
        DATA NASCITA: <input type="date" name="dataNascita"><br><br>
        <input type="hidden" name="registrato" value="0">
        REGISTRATO: <input type="checkbox" name="registrato" value="1"><br><br>
        <input type="submit" name="inserisci" value="Inserisci"><br><br>
    </form>

</body>
</html>