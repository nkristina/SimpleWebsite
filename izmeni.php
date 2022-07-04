<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['izmeniRacun'])){
    ?>
<br/>
<h3>Izmeni podatak</h3>
<form action="" method="post">
    Banka: <input type="text" name="bankaN" value="<?php echo $_POST['Banka']?>"> <br/>
    Racun: <input type="text" name="racunN" value="<?php echo $_POST['brRacuna']?>">
    <input type="hidden" name="stariRacun" value="<?php echo $_POST['brRacuna']?>">
    <input type="submit" name="izmeniR" value="Izmeni" class="dugme">
</form>
<?php } ?>

<?php 
if(isset($_POST['izmeniR'])){
    $br_rac = $_POST['stariRacun'];
    $novi_r = $_POST['racunN'];
    $nova_b = $_POST['bankaN'];
    
    $result2 = mysqli_query($con, "update racun set br_racuna = '$novi_r', banka='$nova_b' where"
                . " br_racuna='$br_rac'");
    if($result2){
         header('Refresh:0');
    }
}

// KASE

if(isset($_POST['izmeniKasu'])){
    ?>
<br/>
<h3>Izmeni podatak</h3>
<form action="" method="post">
    Tip: <select name="tipN">
                        <option>Galeb Pro</option>
                        <option>Galeb N910</option>
                        <option>Galeb XP</option>
                        </select> <br/>
    Objekat: <input type="text" name="objekatN" value="<?php echo $_POST['Objekat']?>">
    <input type="hidden" name="idN" value="<?php echo $_POST['iid']?>">
    <input type="submit" name="izmeniK" value="Izmeni" class="dugme">
</form>
<?php } ?>

<?php 
if(isset($_POST['izmeniK'])){
    $id = $_POST['idN'];
    $novi_t = $_POST['tipN'];
    $novi_o = $_POST['objekatN'];
    
    $result2 = mysqli_query($con, "update kasa set tip = '$novi_t', objekat='$novi_o' where"
                . " id='$id'");
    if($result2){
         header('Refresh:0');
    }
}

// Osnovni podaci

if(isset($_POST['update'])){
    $ime = $_POST['ime'];
    $kor_ime = $_SESSION['korisnik'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];
    $matbr = $_POST['matbr'];
    if(isset($_POST['pdv'])) {
        $pdv = 1;
    }
    else{
        $pdv = 0;
    }    
    
    $result2 = mysqli_query($con, "update preduzece set ime_odg_lica='$ime', mat_br='$matbr',"
            . " email='$email', PDV=$pdv, telefon='$telefon' where kor_ime='$kor_ime'");
    
    if($result2){
         header('Refresh:0');
    }
}
?>