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
        <h2>Dodaj stavku</h2>
        <?php
            session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            $result = mysqli_query($con, "select a.naziv as naziv, a.id as id, o.objekat as objekat from objekti o, artikl a where"
                . " o.id_proizvoda=a.id and o.kor_ime='$kor_ime'");
        if(mysqli_num_rows($result)>0){?>
        <table class="tabele">
            <tr>
                <th>Objekat</th>
                <th>Proizvod</th>
                <th>Kolicina</th>
                <th>&nbsp;</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <form action="" name='stavka1' method="post">
                        <tr>
                            <td><?php echo $row['objekat']?>
                                <input type='hidden' value="<?php echo $row['id']?>" name='idA'>
                                <input type='hidden' value="<?php echo $row['objekat']?>" name='obj'>
                            </td>
                            <td><?php echo $row['naziv']?>
                            </td>
                            <td><input type="number" name='kolicina' required=""></td>
                            <td><input type="submit" name='dodajS' value='Dodaj' class="dugme"></td>
                        </tr>
                    </form>
                <?php } ?>
            </table>
            <?php }
            else
            {
                echo "Nema unetih artikla.";
            }?>
        <hr/>
        <h2>Dodate stavke</h2>
        <?php $result = mysqli_query($con, "select a.naziv as naziv, s.kolicina as kolicina from stavka s, artikl a where"
                . " id_r=0 and s.id_a=a.id");
        if(mysqli_num_rows($result)>0){?>
        <table class="tabele">
            <tr>
                <th>Proizvod</th>
                <th>Kolicina</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td><?php echo $row['naziv']?>
                        </td>
                        <td><?php echo $row['kolicina']?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <?php } ?>
        <form method='post'>
            <input type='submit' value='Zatvaranje racuna' name='formiraj' class='dugme'>
        </form>
        <?php
        mysqli_free_result($result);
        if(isset($_POST['formiraj'])){
            header('Location: formiraj.php');
        }
        include_once './dodajStavku.php';
        mysqli_close($con);
        ?>
    </body>
</html>
