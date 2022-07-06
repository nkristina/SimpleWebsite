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
        <h1>Zahtevi na cekanju</h1>
        <?php include_once './dbconnect.php';
        $result = mysqli_query($con, "select * from preduzece where"
            . " status='na cekanju'");
        if(mysqli_num_rows($result)>0){ ?>
        <table class="tabele">
            <tr>
                <th>Naziv</th>
                <th>Korisnicko ime</th>
                <th>PIB</th>
                <th>Odgovorno lice</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Odobri</th>
                <th>Odbij</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['naziv']?>
                                <input type='hidden' value="<?php echo $row['kor_ime']?>" name='kor_imeP'>
                            </td>
                            <td><?php echo $row['kor_ime']?></td>
                            <td><?php echo $row['PIB']?></td>
                            <td><?php echo $row['ime_odg_lica']?></td>
                            <td><?php echo $row['adresa']?></td>
                            <td><?php echo $row['telefon']?></td>
                            <td><input type="submit" name='odobri' value='Odobri' class="dugme"></td>
                            <td><input type="submit" name='odbij' value='Odbij' class="dugme"></td>
                        </tr>
                    </form>
                <?php } ?>
            </table> <?php
            } 
            else
            {
                echo "Nemate zahteva na cekanju.";
            }?>
        <?php
        mysqli_free_result($result);
        include_once './odobri.php';
        mysqli_close($con);
        ?>
    </body>
</html>
