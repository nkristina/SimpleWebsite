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
        <div class='header'><h1>Log in stranica</h1></div>
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
            include_once './login.php';
        ?>
        
         <hr>
         
         <div name="registracija">
             <h3>Registrujte novo preduzece:</h3>
             <form action="" method="post" name="formaRegistracija" onsubmit="return proveriReg();">
                 <table>
                     <tr>
                         <td>Ime i prezime odgovornog lica:</td>
                         <td><input type='text' name='ime'></td>
                     </tr>
                     <tr>
                         <td>Korisnicko ime:</td>
                         <td><input type='text' name='kor_ime'></td>
                     </tr>
                     <tr>
                         <td>Lozinka:</td>
                         <td><input type='password' name='lozinka'></td>
                     </tr>
                     <tr>
                         <td>Potvrda lozinke:</td>
                         <td><input type='password' name='lozinka2'></td>
                     </tr>
                     <tr>
                         <td>Konktakt telefon:</td>
                         <td><input type='text' name='telefon'></td>
                     </tr>
                     <tr>
                         <td>E-mail adresa:</td>
                         <td><input type='text' name='email'></td>
                     </tr>
                     <tr>
                         <td>Naziv preduzeca:</td>
                         <td><input type='text' name='nazivPreduzeca'></td>
                     </tr>
                     <tr>
                         <td>Adresa sedista preduzeca</td>
                         <td>&nbsp;</td>
                     </tr>
                     <tr>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp; Drzava:</td>
                         <td><input type='text' name='drzava'></td>
                     </tr>
                     <tr>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp; Grad:</td>
                         <td><input type='text' name='grad'></td>
                     </tr>
                     <tr>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp; Postanski broj:</td>
                         <td><input type='text' name='posbr'></td>
                     </tr>
                     <tr>
                         <td>&nbsp;&nbsp;&nbsp;&nbsp; Ulica i broj:</td>
                         <td><input type='text' name='ulica'></td>
                     </tr>
                     <tr>
                         <td>PIB:</td>
                         <td><input type='text' name='PIB'></td>
                     </tr>
                     <tr>
                         <td>Maticni broj preduzeca:</td>
                         <td><input type='text' name='matbr'></td>
                     </tr>
                     <tr>
                         <td><input type='submit' name='reg' value='Registruj' class='dugme'></td>
                         <td>&nbsp;</td>
                     </tr>
                 </table>
             </form>
            <?php
            include_once './createReg.php';
            ?>
         </div> 
         
         
         
         
         
         <div class='footer'><h4>Hvala sto koristite nas sajt!</h4></div>
    </body>
</html>
