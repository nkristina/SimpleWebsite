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
?>