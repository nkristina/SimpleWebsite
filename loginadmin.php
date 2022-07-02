<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="proveraLogIn.js"></script>
    </head>
    <body>
        <div class='header'><h1>Log in stranica za administratora</h1></div>
        <h2>Ulogujte se:</h2>
        <form action="" method="post" name="formaLogIn" onsubmit="return proveri();">
            <table>
                <tr>
                    <td>Korisnicko ime:</td>
                    <td><input type="text" name="ime"></td>
                </tr>
                <tr>
                    <td>Sifra:</td>
                    <td><input type="password" name="sifra"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="login" value="login" class='dugme'></td>
                    <td>&nbsp;</td>
            </table>
        </form>
        <?php
            include_once './loginadminKod.php';
        ?>
         

         <div class='footer'><h4>Hvala sto koristite nas sajt!</h4></div>
    </body>
</html>
