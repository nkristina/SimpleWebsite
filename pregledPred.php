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
        <h1>Preduzeca</h1>
        <form method="post">
            Pretrazi naziv: <input type="text" name="ime">
            <input type="submit" value="Pretrazi" name="trazi">
        </form>
        <br/>
        <?php
        session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
                $result = mysqli_query($con, "select * from preduzece where status='odobren'");
        if(mysqli_num_rows($result)>0){
            $staro = 0;?>
        <table class="tabele">
        <tr>
            <th>Naziv</th>
            <th>Pogledaj proizvode</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
        if(isset($_POST['trazi'])){
            $ime = strtolower($_POST['ime']);
            if(str_contains($row['kor_ime'], $ime)){?>
                <form method="post">
            <tr>
                <td><?php echo $row['naziv']?>
                    <input type="hidden" name='kor_ime' value="<?php echo $row['kor_ime']?>"></td>
                <td><input type="submit" name="detaljiP" value='Proizvodi' class='dugme'></td>
            </tr>
        </form>
            <?php }
        }else{?>
        <form method="post">
            <tr>
                <td><?php echo $row['naziv']?>
                    <input type="hidden" name='kor_ime' value="<?php echo $row['kor_ime']?>"></td>
                <td><input type="submit" name="detaljiP" value='Proizvodi' class='dugme'></td>
            </tr>
        </form>
            <?php
            }
        }?>
        </table>
        <?php }
        else
        {
            echo "Nema preduzeca u sistemu.";
        }
        mysqli_free_result($result);
        include_once './detaljiPreduzece.php';
        mysqli_close($con);
        ?>
    </body>
</html>
