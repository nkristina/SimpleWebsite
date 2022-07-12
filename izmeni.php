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

<?php
// Unos artikla

if(isset($_POST['izmeniArtikl'])){
    $id = $_POST['idA'];
    $result = mysqli_query($con, "select * from artikl where"
                . " id='$id'");
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
    ?>
<form name='artiklIzmena' action="" method="post" onsubmit="return proveriArtikl(2);">
    <fieldset class='formica2'>
        <legend>Izmeni artikl</legend>
    <fieldset class='formica1'> <legend>Opsti podaci*</legend>
    <table>
        <tr> <td> Sifra: </td> <td>  <input type='text' name='sifra' value="<?php echo $row['sifra']?>"> </td> </tr>
        <tr> <td> Naziv: </td> <td> <input type='text' name='naziv' value="<?php echo $row['naziv']?>"> </td> </tr>
        <tr> <td> Jedinica mere: </td> <td> <input type='text' name='jedinica' value="<?php echo $row['jedinica_mere']?>"> </td> </tr>
        <tr> <td> Poreska stopa: </td> <td> <select name="porez">
                        <option value='20'>opsta - 20%</option>
                        <option value='10'>posebna - 10%</option>
                        <option value='0'>ne PDV - 0%</option> 
                        </select>
            <input type='hidden' name='id' value='<?php echo $id ?>'>
            </td> </tr>
    </table>
    </fieldset>
    <fieldset class='formica2'> <legend>Dopunski podaci</legend>
        <table>
            <tr> <td> Zemlja porekla: </td> <td> <input type='text' name='zemlja_porekla' value="<?php echo $row['zemlja']?>"> </td> </tr>
            <tr> <td> Strani naziv artikla:  </td> <td> <input type='text' name='strani' value="<?php echo $row['strani_naziv']?>"> </td> </tr>
            <tr> <td> Barkod broj:  </td> <td> <input type='number' name='barkod' value="<?php echo $row['bar_kod']?>"> </td> </tr>
            <tr> <td> Proizvodjac:  </td> <td> <input type='text' name='proizvodjac' value="<?php echo $row['proizvodjac']?>"> </td> </tr>
            <tr> <td> Carinska tarifa [%]:  </td> <td> <input type='text' name='carina' value="<?php echo $row['carinska_tarifa']?>"> </td> </tr>
            <tr> <td> Eko takse:  </td> <td> <input type='checkbox' name='eko' value="1" <?php if($row['eko_taksa']==1) echo "checked"?>> </td> </tr>
            <tr> <td> Akcize:  </td> <td> <input type='checkbox' name='akcize' value="1" <?php if($row['akcize']==1) echo "checked"?>> </td> </tr>
            <tr> <td> Minimalne zeljene zalihe:  </td> <td> <input type='text' name='minz' value="<?php echo $row['min_kol']?>"> </td> </tr>
            <tr> <td> Maksimalne zeljene zalihe:  </td> <td> <input type='text' name='maxz' value="<?php echo $row['max_kol']?>"> </td> </tr>
            <tr> <td> Opis:  </td> <td> <input type='text' name='opis' value="<?php echo $row['opis']?>"> </td> </tr>
            <tr> <td> Deklaracija:  </td> <td> <input type='text' name='deklaracija' value="<?php echo $row['deklaracija']?>"> </td> </tr>
        </table>
    </fieldset>
        <input type='submit' name="izmeniA" value='Izmeni' class='dugme'>
    </fieldset>
</form>
<?php }
else{
    echo "Greska";
}
}

if(isset($_POST['izmeniA'])){
    $id = $_POST['id'];
    
    $sifra = $_POST['sifra'];
    $naziv = $_POST['naziv'];
    $jm = $_POST['jedinica'];
    $poreska = $_POST['porez'];
    
    $zemlja=$_POST['zemlja_porekla'];
    $proiz = $_POST['proizvodjac'];
    $strani = $_POST['strani'];
    $tarifa = $_POST['carina'];
    $min_zalihe = $_POST['minz'];
    $max_zalihe = $_POST['maxz'];
    $barkod = $_POST['barkod'];
    $opis = $_POST['opis'];
    $deklaracija = $_POST['deklaracija'];
    
    if($max_zalihe=='')
        $max_zalihe='NULL';
    if($min_zalihe=='')
        $min_zalihe='NULL';
    if($tarifa=='')
        $tarifa='NULL';
    
    $result2 = mysqli_query($con, "update artikl set sifra='$sifra', naziv='$naziv', jedinica_mere='$jm',"
                . " stopa_poreza=$poreska, zemlja='$zemlja',"
            . " strani_naziv='$strani', opis='$opis', deklaracija='$deklaracija',"
            . " max_kol=$max_zalihe, min_kol=$min_zalihe, carinska_tarifa=$tarifa, bar_kod='$barkod', proizvodjac='$proiz' where id='$id'");
    
    if($result2){
        if(isset($_POST['akcize']))
        {
            $result = mysqli_query($con, "update artikl set akcize=1 where "
                . " id='$id'");
        }
        else{
            $result = mysqli_query($con, "update artikl set akcize=0 where "
                . " id='$id'");
        }
        if(isset($_POST['eko'])){
            $result = mysqli_query($con, "update artikl set eko_taksa=1 where "
               . " id='$id'");
        }
        else{
            $result = mysqli_query($con, "update artikl set eko_taksa=0 where "
               . " id='$id'");
        }
        header('Refresh:0');
    }
    else{
        echo "greskica";
    }
}
?>