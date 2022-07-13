<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['dodajS'])){
    
    $kor_ime = $_SESSION['korisnik'];
    $id = $_POST['idA'];
    $objekat = $_POST['obj'];
    $kolicina = $_POST['kolicina'];
    
    $cena = mysqli_query($con, "select cena_prod as cena from objekti where"
            . " kor_ime='$kor_ime' and id_proizvoda=$id and objekat='$objekat'");
    if(mysqli_num_rows($cena)>0){
        
        $cenaa = mysqli_fetch_assoc($cena);
        $cenaa = $cenaa['cena'];
        $porezR = mysqli_query($con, "select PDV from preduzece where"
            . " kor_ime='$kor_ime'");
        $pdv = mysqli_fetch_assoc($porezR);
        $pdv = $pdv['PDV'];
        if($pdv==1){
            $stopaR = mysqli_query($con, "select stopa_poreza from artikl where"
            . " id='$id'");
            $stopa = mysqli_fetch_assoc($stopaR);
            $stopa = $stopa['stopa_poreza'];
            $porez = $cenaa*$kolicina*$stopa*0.001;
        }
        else{
            $porez=0;
        }
        $ukupno = $cenaa*$kolicina;
        
        $result = mysqli_query($con, "insert into stavka (id_r, id_a, kolicina, objekat, porez, cena)"
                . " values (0, $id, $kolicina, '$objekat', $porez, $ukupno)");
        if($result){
            header('Refresh:0');
        }
        else{
            "Greska dalje";
        }
    }
    else{
        echo "Greska";
    }
}?>