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
        <script src="proveraLogIn.js"></script>
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
           <li class="big">Pregled stanja</li> <br/>
           <ol type="i">
               <li><a href="osnovniPodaci.php" target="frejm">Osnovni podaci</a></li>
               <li><a href="racuni.php" target="frejm">Ziro racuni</a></li>
               <li><a href="kase.php" target="frejm">Kase</a></li>
           </ol> <br/>
           <li class="big">Narucioci</li> <br/>
           <ol type="i">
               <li><a href="dodajNarucioca.php" target="frejm">Dodaj narucioca</a></li>
               <li><a href="narucioci.php" target="frejm">Pregled narucioca</a></li>
           </ol><br/>
           <li class="big"><a href="roba.php" target="frejm">Robe i usluge</a></li><br/>
           <li class="big"><a href="stavka.php" target="frejm">Izdavanje racuna</a></li><br/>
           <li class="big"><a href="kategorije.php" target="frejm">Kategorije</li> <br/>
           <li class="big">Pregled izvestaja</li> <br/>
           <ol type="i">
               <li><a href="dnevniPazar.php" target="frejm">Dnevni pazar</a></li>
               <li><a href="poStavkama.php" target="frejm">Izvestaj po stavkama</a></li>
           </ol><br/>
           <li class="big"><a href="novaLozinka.php">Promeni lozinku</a></li>
        </ol><br/>
        </div>
        <div id="sredina">
        <iframe name="frejm" src="osnovniPodaci.php">
        </iframe>
        </div>
        <div class='footer'>
        <h4>Hvala sto koristite nas sajt!</h4>
            <form action='logout.php' method='post'>
            <input type='submit' value='logout' class="dugme">
            </form></div>
    </body>
</html>
