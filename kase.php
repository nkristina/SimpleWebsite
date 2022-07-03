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
        <h2>Dodaj kasu:</h2>
        <form action="" method="post" name="formaDodajK" onsubmit="return proveriKasu();">
            Kasa: <select name="kasaD">
                        <option>Galeb Pro</option>
                        <option>Galeb N910</option>
                        <option>Galeb XP</option>
                        </select> &nbsp;
            Objekat: <input type="text" name="objekatD">
            <input type="submit" name="dodajK" value="Dodaj" class="dugme">
        </form>
        <h1>Pregled svih kasa</h1>
        <table>
            <tr>
                <th>Kasa</th>
                <th>Objekat</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php
            session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            $result = mysqli_query($con, "select tip, objekat, id from kasa where"
                . " kor_ime='$kor_ime'");
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['tip']?>
                                <input type='hidden' value="<?php echo $row['id']?>" name='iid'>
                            </td>
                            <td><?php echo $row['objekat']?>
                                <input type='hidden' value="<?php echo $row['objekat']?>" name='Objekat'>
                            </td>
                            <td><input type="submit" name='obrisiKasu' value='Obrisi' class="dugme"></td>
                            <td><input type="submit" name='izmeniKasu' value='Izmeni' class="dugme"></td>
                        </tr>
                    </form>
                <?php }
            }
            else
            {
                echo "Nemate unete kase.";
            }?>    
        </table>
        <?php
        mysqli_free_result($result);
        include_once './obrisi.php';
        include_once './izmeni.php';
        include_once './dodaj.php';
        ?>
    </body>
</html>
