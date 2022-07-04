<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['regNaruc'])){
    $ime = $_POST['ime'];
    $kor_ime = $_POST['kor_ime'];
    $naziv = $_POST['nazivPreduzeca'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $adresa = $_POST['drzava'] . " " . $_POST['grad'] . " " . $_POST['posbr'] . " " . $_POST['ulica'];
    $sifra = $_POST['lozinka'];
    $pib = $_POST['PIB'];
    $matbr = $_POST['matbr'];
    $rabata = $_POST['rabata'];
    $br_dana = $_POST['br_dana'];
    
    // Proveri da li postoji ime
    $result = mysqli_query($con, "select * from administrator as a, kupac as k, preduzece as p where"
            . " a.kor_ime='$kor_ime' or k.kor_ime='$kor_ime' or p.kor_ime='$kor_ime'");
   
    if(mysqli_num_rows($result)>0){
        echo "<span style='color: red'>Zauzeto korisnicko ime! </span>";
        mysqli_free_result($result);
    }
    else{
        
        $result = mysqli_query($con, "select kor_ime from preduzece where email='$email'");
        
        if(mysqli_num_rows($result)>0){
            echo "<span style='color: red'>Zauzeta email adresa! </span>";
            mysqli_free_result($result);
        }
        else{
            $result = mysqli_query($con, "select PIB from preduzece where PIB=$pib");
        
            if(mysqli_num_rows($result)>0){
                echo "<span style='color: red'>Vec postoji ovaj PIB u sistemu! </span>";
                mysqli_free_result($result);
            }
            else{
                $status = mysqli_query($con, "insert into preduzece (kor_ime, naziv, sifra, ime_odg_lica, email, telefon, PIB, mat_br, adresa, status) "
                                            . " values ('$kor_ime', '$naziv', '$sifra', '$ime', '$email', '$telefon', $pib, '$matbr', '$adresa', 'na cekanju')");

                if($status){
                    session_start();
                    $kor_ime_tr = $_SESSION['korisnik'];
                    $status2 = mysqli_query($con, "insert into narucioc (kor_ime, kor_imeN, broj_dana, rabata) "
                                            . " values ('$kor_ime_tr', '$kor_ime', $br_dana, $rabata)");
                    if($status2){
                        echo "Uspesno dodat.";
                    }
                    else{
                        echo "<span style='color: red'> Greska pri dodavanju narucioca! </span>";
                    }
                }
                else {
                    echo "<span style='color: red'> Greska pri registraciji! </span>";
                }
            }
        }
    }
}

?>