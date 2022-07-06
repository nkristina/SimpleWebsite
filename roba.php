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
        if(!isset($_SESSION['stranica']))
            $_SESSION['stranica'] = 1;
        ?>
        <h1>Artikli</h1
        <?php
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            $idstr = $_SESSION['stranica'];
            echo $idstr;
            $offset = 5*($idstr-1);
            $result = mysqli_query($con, "select id, naziv, sifra from artikl where"
                . " kor_ime='$kor_ime' limit 5 offset $offset");
            if(mysqli_num_rows($result)>0){?>
        <table class='tabele'>
            <tr>
                <th>Naziv</th>
                <th>Sifra</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['naziv']?>
                                <input type='hidden' value="<?php echo $row['id']?>" name='id'>
                            </td>
                            <td><?php echo $row['sifra']?>
                            </td>
                            <td><input type="submit" name='obrisiRacun' value='Obrisi' class="dugme"></td>
                            <td><input type="submit" name='izmeniRacun' value='Izmeni' class="dugme"></td>
                        </tr>
                    </form>
                <?php } ?>
        </table> <?php
            if(isset($_GET['desno'])){
                echo "Plsss";
                if($_SESSION['stranica']<2){
                    $_SESSION['stranica']++;
                    header('Refresh:0');
                    }
                }
            }
            else
            {
                echo "Nema unetih artikla.";
            }?>
        <?php
            /*if(isset($_POST['levo'])){
                if($_SESSION['stranica']>1){
                    $_SESSION['stranica']=$_SESSION['stranica']-1;
                    header('Refresh:0');
            }
        }*/
        ?>
        <?php
        mysqli_free_result($result);
        mysqli_close($con);
        ?>
    </body>
</html>
