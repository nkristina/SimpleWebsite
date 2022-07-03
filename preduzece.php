<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Preduzece-glavna</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION['tip']) || $_SESSION['tip']!='preduzece')
        {  
            header('Location: ./index.php');
            exit;
        }
        ?>
        <div class='header'><h1>Preduzece</h1></div>
        <div id="meni">
        <a id="naslov" href="preduzece.php">Meni</a>
        <ol>
           <li>Pregled stanja</li>
           <ol>
               <li><a href="osnovniPodaci.php" target="frejm">Osnovni podaci</a></li>
               <li><a href="racuni.php" target="frejm">Ziro racuni</a></li>
               <li><a href="kase.php" target="frejm">Kase</a></li>
           </ol>
           <li><a href="novaLozinka.php">Promeni lozinku</a></li>
        </ol><br/>
        </div>
        <div id="sredina">
        <iframe name="frejm">
        </iframe>
        </div>
        <div class='footer'>
        <h4>Hvala sto koristite nas sajt!</h4>
            <form action='logout.php' method='post'>
            <input type='submit' value='logout' class="dugme">
            </form></div>
    </body>
</html>
