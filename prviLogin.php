<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prvi Log In</title>
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
        <div class='header'><h1>Dodatni podaci za registraciju</h1></div>
        <h3>Molimo popunite sledece podatke:</h3>
        
        <?php
        if(!isset($_SESSION['brojKase']))  $_SESSION['brojKase']= 1;
        if(!isset($_SESSION['brojRacune']))  $_SESSION['brojRacune']= 1;
        if(!isset($_SESSION['brojSifre']))  $_SESSION['brojSifre']= 1;?> 
        
        <form action="prviLoginKod.php" method="post" name="formaPrviLog" onsubmit="return proveriPrvi();">
            <table>
                <?php 
                for($k=0; $k<$_SESSION['brojSifre']; $k++){?>
                <tr>
                    <td>Sifra delatnosti:</td>
                    <td><input type="text" name="sifra[]"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Da li je preduzece u sistemu PDV:</td>
                    <td><input type="checkbox" name="pdv" value="1">DA</td>
                </tr>
                <tr>
                    <td>Poslovni ziro racini:</td>
                    <td>&nbsp;</td>
                </tr>
                <?php 
                for($i=0; $i<$_SESSION['brojRacune']; $i++){?>
                <tr>
                    <td>Banka:</td>
                    <td><input type="text" name="banka[]"></td>
                </tr>
                <tr>
                    <td>Racun:</td>
                    <td><input type="text" name="racun[]"></td>
                </tr>
                <?php } ?> 
                <tr>
                    <td>Broj kasa:</td>
                    <td><input type="number" name="broj" value="<?php if(isset($_SESSION['brojKase'])) echo $_SESSION['brojKase']; else echo 1;?>"></td>
                </tr>
                <?php for($j=0; $j<$_SESSION['brojKase']; $j++){?>
                <tr>
                    <td>Tip:</td>
                    <td><select name="tip[]">
                        <option>Galeb Pro</option>
                        <option>Galeb N910</option>
                        <option>Galeb XP</option>
                        </select></td>
                </tr> 
                <tr>
                    <td>Objekat:</td>
                    <td><input type="text" name="objekat[]"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><input type="submit" name="unesi" value="Unesi i nastavi dalje" class='dugme'></td>
                    <td>&nbsp;</td>
                </tr>
                </table>
        </form>
        <form method="post">
            <input type="submit" name="kasaPlus" value="Dodaj polje za kasu" class="dugme">
            <input type="submit" name="racunPlus" value="Dodaj polje za racun" class="dugme">  
            <input type="submit" name="sifraPlus" value="Dodaj polje za sifru delatnosti" class="dugme">   
        </form>
        <?php 
        if(isset($_POST['kasaPlus'])){
            $_SESSION['brojKase']++;
            header('Refresh:0');
        }
        if(isset($_POST['racunPlus'])){
            $_SESSION['brojRacune']++;
            header('Refresh:0');
        }
        if(isset($_POST['sifraPlus'])){
            $_SESSION['brojSifre']++;
            header('Refresh:0');
        }
        ?>
        <p>Mocicete da menjate ove podatke i kasnije.</p>
        <div class='footer'>
        <h4>Hvala sto koristite nas sajt!</h4>
            <form action='logout.php' method='post'>
            <input type='submit' value='logout' class="dugme">
            </form></div>
    </body>
</html>
