<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['unesi'])){
    include_once './dbconnect.php';
    $sifre = $_POST['sifra'];
    $kor_ime = $_SESSION['korisnik'];
    
    foreach($sifre as $sif){
        if ($sif!=''){
            $result = mysqli_query($con, "insert into delatnost (kor_ime, sifra) values"
                . " ('$kor_ime','$sif')");

            if(!$result){
                echo Greska;
                exit;
            }
        }
    }
    
    if(isset($_POST['pdv']))
    {
         $result = mysqli_query($con, "update preduzece set PDV=1 where "
                . " kor_ime='$kor_ime'");
         
        if(!$result){
            echo Greska;
            exit;
        }
    }
    
    $tip = $_POST['tip'];
    $objekat = $_POST['objekat'];
    
    for($i=0; $i<sizeof($objekat); $i++){
        if ($objekat[$i]!=''){
            $result = mysqli_query($con, "insert into kasa (kor_ime, objekat, tip) values"
                . " ('$kor_ime','$objekat[$i]','$tip[$i]')");

            if(!$result){
                echo "Greska - kasa";
                exit;
            }
        }
    }
    
    $banka = $_POST['banka'];
    $racun = $_POST['racun'];
    
    for($i=0; $i<count($banka); $i++){
        if ($racun[$i]!=''){
            $result = mysqli_query($con, "insert into racun (kor_ime, br_racuna, banka) values"
                . " ('$kor_ime','$racun[$i]','$banka[$i]')");

            if(!$result){
                //echo "Greska - racun";
                exit;
            }
        }
    }
    mysqli_close($con);
    header('Location: ./preduzece.php');
}
?>