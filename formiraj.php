<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="proveraLogIn.js"></script>
    </head>
    <body>
        <?php
            session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';?>
        <h2>Formiranje racuna</h2>
        <form method='post'>
            Odaberite nacin placanja: <select name="nacin">
                        <option>Gotovina</option>
                        <option>Cek</option>
                        <option>Kartica</option>
                        <option>Virman</option>
                        </select>
            <input type='submit' value='odaberi' name='odaberiNacin'>
        </form>
        <?php 
        if(isset($_POST['odaberiNacin'])){
            $nacin = $_POST['nacin'];
            if($nacin=='Gotovina'){?>
            <form method="post" name='placanje'>
                    <table>
                        <tr><td>Iznos:</td>
                        <td><input type='text' name='iznos' required=""></td></tr>
                        <tr><td>Broj licne karte:</td>
                        <td><input type='text' name="licna"></td>
                        <tr><td><input type='submit' value='Unesi' name='uneo' class='dugme'></td>
                            <td>&nbsp;</td></tr>
                    </table>
                <input type='hidden' value='Gotovina' name='nacin'>
                </form>  
            <?php }elseif($nacin=='Cek'){?>
                <form method="post" name='placanje'>
                    <table>
                        <tr><td>Ime:</td>
                        <td><input type='text' name='ime' required=""></td></tr>
                        <tr><td>Prezime:</td>
                        <td><input type='text' name='prezime' required=""></td></tr>
                        <tr><td>Broj licne karte:</td>
                        <td><input type='text' name="licna" required=""></td>
                        <tr><td><input type='submit' value='Unesi' name='uneo' class='dugme'></td>
                            <td>&nbsp;</td></tr>
                    </table>
                    <input type='hidden' value='Cek' name='nacin'>
                </form>  
            <?php }elseif($nacin=='Kartica'){?>
            <form method="post" name='placanje'>
                    <table>
                        <tr><td>Broj licne karte:</td>
                        <td><input type='text' name="licna" required=""></td>
                        <tr><td>Slip broj:</td>
                            <td><input type='text' name="slip" required=""></td></tr>
                        <tr><td><input type='submit' value='Unesi' name='uneo' class='dugme'></td>
                            <td>&nbsp;</td></tr>
                    </table>
                    <input type='hidden' value='Kartica' name='nacin'>
                </form>
        <?php }else{?>
        <br/>Odaberi narucioca: <?php
        $result = mysqli_query($con, "select p.naziv as naziv, p.adresa as adresa, p.kor_ime as kn from narucioc n, preduzece p"
        . " where n.kor_imeN=p.kor_ime and n.kor_ime='$kor_ime'");
        if(mysqli_num_rows($result)>0){ ?>
        <table class="tabele">
        <tr>
            <th>Naziv</th>
            <th>Adresa</th>
            <th>&nbsp;</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <form action="" method="post">
            <tr>
                <td><?php echo $row['naziv']?>
                    <input type='hidden' name="koje" value='<?php echo $row['kn']?>'></td>
                <td><?php echo $row['adresa']?>
                <td><input type="submit" name='uneo' value='Izaberi' class="dugme">
                <input type='hidden' value='Virman' name='nacin'></td>
            </tr>
            </form>
            <?php } ?>
        </table>
        <?php  }
        else
        {
            echo "Ne postoje narucioci za vase preduzece.";
        }
        }}
        include_once './formirajKod.php';
        mysqli_close($con);?>
    </body>
</html>