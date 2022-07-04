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
        <?php include_once './dbconnect.php'; ?>
        <div id="prekoPiba">
        <h2>Dodaj narucioca iz baze:</h2>
        <form action="" method="post" name="prekoPIB" onsubmit="return proveriPIB();">
            PIB: <input type="text" name="pib2"> &nbsp;
            Broj dana za placanje: <input type='number' name='br_dana2'> &nbsp;
            Rabata [%]: <input type='text' name='rabata2'> &nbsp;
            <input type="submit" name="pretrazi" value="Pretrazi" class="dugme">
        </form>
            <?php
            include_once './pretraziNarucioca.php';
            ?>
        </div>
        <hr/>
         <div id="dodajNar">
         <h2>Dodaj novog narucioca:</h2>
         <form action="" method="post" name="formaDodajNar" onsubmit="return proveriReg(2);">
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
                     <td>Broj dana za placanje:</td>
                     <td><input type='number' name='br_dana'></td>
                 </tr>
                 <tr>
                     <td>Rabata [%]:</td>
                     <td><input type='text' name='rabata'></td>
                 </tr>
                 <tr>
                     <td><input type='submit' name='regNaruc' value='Dodaj' class='dugme'></td>
                     <td>&nbsp;</td>
                 </tr>
             </table>
         </form>
            <?php
            include_once './dodajNaruciocaKod.php';
            ?>
         </div> 
        <?php mysqli_close($con); ?>
    </body>
</html>
