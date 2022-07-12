<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['dodajR'])){
    $novi_r = $_POST['racunD'];
    $nova_b = $_POST['bankaD'];
    $kor_ime = $_SESSION['korisnik'];
    
    $result2 = mysqli_query($con, "insert into racun (kor_ime, br_racuna, banka) values"
            . " ('$kor_ime', '$novi_r', '$nova_b')");
    
    if($result2){
         header('Refresh:0');
    }
    else{
        "Vec postoji ovakav racun.";
    }
}

//KASE

if(isset($_POST['dodajK'])){
    $novi_t = $_POST['kasaD'];
    $novi_o = $_POST['objekatD'];
    $kor_ime = $_SESSION['korisnik'];
    
    $result2 = mysqli_query($con, "insert into kasa (kor_ime, objekat, tip) values"
            . " ('$kor_ime', '$novi_o', '$novi_t')");
    
    if($result2){
         header('Refresh:0');
    }
    else{
        "Greska.";
    }
}

// Artikli
if(isset($_POST['noviA'])){ ?>
<form name='artikl' action="" method="post" onsubmit="return proveriArtikl(1);">
    <fieldset class='formica2'>
        <legend>Dodaj artikl</legend>
    <fieldset class='formica1'> <legend>Opsti podaci*</legend>
    <table>
        <tr> <td> Sifra: </td> <td>  <input type='text' name='sifra'> </td> </tr>
        <tr> <td> Naziv: </td> <td> <input type='text' name='naziv'> </td> </tr>
        <tr> <td> Jedinica mere: </td> <td> <input type='text' name='jedinica'> </td> </tr>
        <tr> <td> Poreska stopa: </td> <td> <select name="porez">
                        <option value='20'>opsta - 20%</option>
                        <option value='10'>posebna - 10%</option>
                        <option value='0'>ne PDV - 0%</option> 
                        </select>
            </td> </tr>
    </table>
    </fieldset>
    <fieldset class='formica2'> <legend>Dopunski podaci</legend>
        <table>
            <tr> <td> Zemlja porekla: </td> <td> <input type='text' name='zemlja_porekla'> </td> </tr>
            <tr> <td> Strani naziv artikla:  </td> <td> <input type='text' name='strani'> </td> </tr>
            <tr> <td> Barkod broj:  </td> <td> <input type='text' name='barkod'> </td> </tr>
            <tr> <td> Proizvodjac:  </td> <td> <input type='text' name='proizvodjac'> </td> </tr>
            <tr> <td> Carinska tarifa [%]:  </td> <td> <input type='text' name='carina'> </td> </tr>
            <tr> <td> Eko takse:  </td> <td> <input type='checkbox' name='eko' value="1"> </td> </tr>
            <tr> <td> Akcize:  </td> <td> <input type='checkbox' name='akcize' value="1"> </td> </tr>
            <tr> <td> Minimalne zeljene zalihe:  </td> <td> <input type='text' name='minz'> </td> </tr>
            <tr> <td> Maksimalne zeljene zalihe:  </td> <td> <input type='text' name='maxz'> </td> </tr>
            <tr> <td> Opis:  </td> <td> <input type='text' name='opis'> </td> </tr>
            <tr> <td> Deklaracija:  </td> <td> <input type='text' name='deklaracija'> </td> </tr>
        </table>
    </fieldset>
        <input type='submit' name="dodajA" value='Dodaj' class='dugme'>
    </fieldset>
</form>
<?php }
if(isset($_POST['dodajA'])){
    $sifra = $_POST['sifra'];
    $naziv = $_POST['naziv'];
    $jm = $_POST['jedinica'];
    $poreska = $_POST['porez'];
    
    $zemlja=$_POST['zemlja_porekla'];
    $proiz = $_POST['proizvodjac'];
    $barkod = $_POST['barkod'];
    $strani = $_POST['strani'];
    $tarifa = $_POST['carina'];
    $min_zalihe = $_POST['minz'];
    $max_zalihe = $_POST['maxz'];
    $opis = $_POST['opis'];
    $deklaracija = $_POST['deklaracija'];
    
    if($max_zalihe=='')
        $max_zalihe='NULL';
    if($min_zalihe=='')
        $min_zalihe='NULL';
    if($tarifa=='')
        $tarifa='NULL';
    
    $kor_ime=$_SESSION['korisnik'];
    
    $result2 = mysqli_query($con, "insert into artikl (sifra, kor_ime, naziv, jedinica_mere, "
                . "stopa_poreza, zemlja, strani_naziv, opis, deklaracija, max_kol, min_kol, carinska_tarifa, bar_kod, proizvodjac)"
            . " values ('$sifra', '$kor_ime', '$naziv', '$jm', $poreska, '$zemlja', '$strani', '$opis', '$deklaracija', $max_zalihe,"
            . " $min_zalihe, $tarifa, '$barkod', '$proiz')");
    if($result2){
        header('Refresh:0');
    }
    else{
        echo "greskica";
    }
}
?>