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
        <h1>Osnovni podaci o preduzecu</h1>
        <?php 
        session_start();
        $kor_ime = $_SESSION['korisnik'];
        include_once './dbconnect.php';
        $result = mysqli_query($con, "select * from preduzece where "
            . " kor_ime='$kor_ime'");
        if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);?>
        <form action="" method="post" name="formaOsnovni" onsubmit="return proveriOsnovni();">
                 <table>
                     <tr>
                         <td>Ime i prezime odgovornog lica:</td>
                         <td><input type='text' name='ime' value="<?php echo $row['ime_odg_lica']?>"></td>
                     </tr>
                     <tr>
                         <td>Korisnicko ime:</td>
                         <td><?php echo $row['kor_ime']?></td>
                     </tr>
                     <tr>
                         <td>Konktakt telefon:</td>
                         <td><input type='text' name='telefon' value="<?php echo $row['telefon']?>"></td>
                     </tr>
                     <tr>
                         <td>E-mail adresa:</td>
                         <td><input type='text' name='email' value="<?php echo $row['email']?>"></td>
                     </tr>
                     <tr>
                         <td>Naziv preduzeca:</td>
                         <td><?php echo $row['naziv']?></td>
                     </tr>
                     <tr>
                         <td>Adresa sedista preduzeca:</td>
                         <td><input type='text' name='adresa' value="<?php echo $row['adresa']?>"></td>
                     </tr>
                     <tr>
                         <td>PIB:</td>
                         <td><?php echo $row['PIB']?></td>
                     </tr>
                     <tr>
                         <td>Maticni broj preduzeca:</td>
                         <td><input type='text' name='matbr' value="<?php echo $row['mat_br']?>"></td>
                     </tr>
                     <tr>
                        <td>Da li je preduzece u sistemu PDV:</td>
                        <td><input type="checkbox" name="pdv" value="1" <?php if($row['PDV']==1) echo "checked"?>>DA</td>
                    </tr>
                     <tr>
                         <td><input type='submit' name='update' value='Sacuvaj izemen' class='dugme'></td>
                         <td>&nbsp;</td>
                     </tr>
                 </table>
             </form>
        <?php 
        mysqli_free_result($result);
        }
        else{
            echo "Greska!";
        }
        include_once './izmeni.php';
        mysqli_close($con);
        ?>
    </body>
</html>
