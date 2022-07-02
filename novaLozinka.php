<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Promena lozinke</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="proveraLogIn.js"></script>
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION['tip']))
        {  
            header('Location: ./index.php');
            exit;
        }
        ?>
        <div class='header'><h1>Promena Lozinke</h1></div>
        <h2>Popunite sledece podatke:</h2>
        <form action="" method="post" name="formaLozinka" onsubmit="return proveriLoz();">
            <table>
                <tr>
                    <td>Trenutna lozinka:</td>
                    <td><input type="password" name="trenutna"></td>
                </tr>
                <tr>
                    <td>Nova lozinka:</td>
                    <td><input type="password" name="sifra"></td>
                </tr>
                <tr>
                    <td>Ponovite novu lozinku:</td>
                    <td><input type="password" name="sifra2"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="promeni" value="Promeni" class='dugme'></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
        <form>
            <table>
                <tr>
                    <td><form action="" method="get"><input type="submit" name="nazad" value="Nazad" class='dugme'></form></td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </form>
        <p>Ukoliko je lozinka uspesno pormenjena bicete vraceni na LogIn stranicu.</p>
        <?php
            include_once './novaLozinkaKod.php';
        ?>
        <div class='footer'>
        <h4>Hvala sto koristite nas sajt!</h4>
            <form action='logout.php' method='post'>
            <input type='submit' value='logout' class="dugme">
            </form></div>
    </body>
</html>
