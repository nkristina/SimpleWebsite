<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Kupac-glavna</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="proveraLogIn.js"></script>
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION['tip']) || $_SESSION['tip']!='kupac')
        {  
            header('Location: ./index.php');
            exit;
        }
        ?>
        <div class='header'><h1>Kupac</h1></div>
        <div id="meni">
        <a id="naslov" href="kupac.php">Meni</a>
        <ol>
            <li><a href="zahtevi.php" target="frejmA">Zahtevi</a></li>
            <li><a href="dodajPreduzece.php" target="frejmA">Dodaj preduzece</a></li>
            <li><a href="dodajKupca.php" target="frejmA">Dodaj kupca</a></li>
            <li><a href="izvestaj.php" target="frejmA">Izvestaji</a></li>
            <li><a href="novaLozinka.php">Promeni lozinku</a></li>
        </ol><br/>
        </div>
        <div id="sredina">
        <iframe name="frejmA">
        </iframe>
        </div>
        <div class='footer'>
        <h4>Hvala sto koristite nas sajt!</h4>
            <form action='logout.php' method='post'>
            <input type='submit' value='logout' class="dugme">
            </form></div>
    </body>
</html>
