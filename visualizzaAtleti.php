<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Atleti</title>
</head>
<body>
    <h1>Visualizza Atleti</h1>
    <?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "atleticanoalese");


    if(isset($_POST['elimina'])) {
        // Solo se abbiamo premuto il tasto elimina
        $sql = "DELETE FROM atleti WHERE ID=$_POST[selezione]";
        mysqli_query($conn, $sql);
    }
    
    $sql = "SELECT * FROM atleti";
    $atleti = mysqli_query($conn, $sql);
    $atleta = mysqli_fetch_assoc($atleti);
    // disegno la tabella

    echo ("<form>");
    echo ("<table width='100%' border='1px'>");

    while($atleta) {
        // disegno riga
        echo ("<tr>");
        echo ("<td><input type='radio' name='selezione' value='$atleta[ID]' checked></td>");
        echo ("<td>$atleta[ID]</td>");
        echo ("<td>$atleta[nome]</td>");
        echo ("<td>$atleta[cognome]</td>");
        echo ("<td>$atleta[numeroTessera]</td>");
        echo ("<td>$atleta[sesso]</td>");
        echo ("<td>$atleta[categoria]</td>");
        echo ("<td>$atleta[dataNascita]</td>");
        echo ("<td>$atleta[registrato]</td>");
        echo ("</tr>");
        $atleta = mysqli_fetch_assoc($atleti);
    }
    echo ("</table>");
    echo("<input type='submit' name='elimina' value='Elimina' formaction='visualizzaAtleti.php' formmethod='POST'>");
    echo("<input type='submit' name='modifica' value='Modifica' formaction='modificaAtleta.php' formmethod='POST'>");
    echo ("<form>");
    ?>
</body>

</html>