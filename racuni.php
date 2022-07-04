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
        <h2>Dodaj racun:</h2>
        <form action="" method="post" name="formaDodajR" onsubmit="return proveriRacun();">
            Banka: <input type="text" name="bankaD"> &nbsp;
            Racun: <input type="text" name="racunD">
            <input type="submit" name="dodajR" value="Dodaj" class="dugme">
        </form>
        <h1>Pregled tekucih racuna</h1>
        <?php session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            $result = mysqli_query($con, "select banka, br_racuna from racun where"
                . " kor_ime='$kor_ime'");
            if(mysqli_num_rows($result)>0){ ?>
        <table>
            <tr>
                <th>Banka</th>
                <th>Broj racuna</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['banka']?>
                                <input type='hidden' value="<?php echo $row['br_racuna']?>" name='brRacuna'>
                            </td>
                            <td><?php echo $row['br_racuna']?>
                                <input type='hidden' value="<?php echo $row['banka']?>" name='Banka'>
                            </td>
                            <td><input type="submit" name='obrisiRacun' value='Obrisi' class="dugme"></td>
                            <td><input type="submit" name='izmeniRacun' value='Izmeni' class="dugme"></td>
                        </tr>
                    </form>
                <?php }
            }
            else
            {
                echo "Nemate otvorene racune.";
            }?>    
        </table>
        <?php
        mysqli_free_result($result);
        include_once './obrisi.php';
        include_once './izmeni.php';
        include_once './dodaj.php';
        mysqli_close($con);
        ?>
    </body>
</html>
