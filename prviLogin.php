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
        <form action="" method="post" name="formaPrviLog" onsubmit="return proveriPrvi();">
            <table>
                <tr>
                    <td>Sifra delatnosti 1:</td>
                    <td><input type="text" name="sifra[]"></td>
                </tr>
                <tr>
                    <td>Sifra delatnosti 2:</td>
                    <td><input type="text" name="sifra[]"></td>
                </tr>
                <tr>
                    <td>Sifra delatnosti 3:</td>
                    <td><input type="text" name="sifra[]"></td>
                </tr>
                <tr>
                    <td>Da li je preduzece u sistemu PDV:</td>
                    <td><input type="checkbox" name="pdv">DA</td>
                </tr>
                <tr>
                    <td>Poslovni ziro racini:</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Banka 1:</td>
                    <td><input type="text" name="banka[]"></td>
                </tr>
                <tr>
                    <td>Racun 1:</td>
                    <td><input type="text" name="racun[]"></td>
                </tr>
                <tr>
                    <td>Banka 2:</td>
                    <td><input type="text" name="banka[]"></td>
                </tr>
                <tr>
                    <td>Racun 2:</td>
                    <td><input type="text" name="racun[]"></td>
                </tr>
                <tr>
                    <td>Banka 3:</td>
                    <td><input type="text" name="banka[]"></td>
                </tr>
                <tr>
                    <td>Racun 3:</td>
                    <td><input type="text" name="racun[]"></td>
                </tr>
                <tr>
                    <td>Broj kasi:</td>
                    <td><input type="number" name="broj" value="1"></td>
                </tr>
                <tr>
                    <td>Tip 1:</td>
                    <td><input type="text" name="tip[]"></td>
                </tr>
                <tr>
                    <td>Objekat 1:</td>
                    <td><input type="text" name="objekat[]"></td>
                </tr>
                <tr>
                    <td>Tip 2:</td>
                    <td><input type="text" name="tip[]"></td>
                </tr>
                <tr>
                    <td>Objekat 2:</td>
                    <td><input type="text" name="objekat[]"></td>
                </tr>
                <tr>
                    <td>Tip 3:</td>
                    <td><input type="text" name="tip[]"></td>
                </tr>
                <tr>
                    <td>Objekat 3:</td>
                    <td><input type="text" name="objekat[]"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="unesi" value="Unesi" class='dugme'></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
        <?php
            include_once './prviLoginKod.php';
        ?>
        <div class='footer'>
        <h4>Hvala sto koristite nas sajt!</h4>
            <form action='logout.php' method='post'>
            <input type='submit' value='logout' class="dugme">
            </form></div>
    </body>
</html>
