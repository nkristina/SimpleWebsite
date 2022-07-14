<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// Uneo nacin placanja
if(isset($_POST['uneo'])){
    $kor_ime = $_SESSION['korisnik'];
    $nacin = $_POST['nacin'];
    if(isset($_POST['ime'])){
        $ime = $_POST['ime'];
    }
    if(isset($_POST['prezime'])){
        $prezime = $_POST['prezime'];
    }
    if(isset($_POST['licna'])){
        $licna = $_POST['licna'];
    }
    if(isset($_POST['slip'])){
        $slip = $_POST['slip'];
    }
    if(isset($_POST['iznos'])){
        $iznos = $_POST['iznos'];
    }
    
    $date = date("Y-m-d");
    $cena = mysqli_query($con, "select sum(cena) as cenaC, sum(porez) as porezF from stavka where"
            . " id_r=0");
    if(mysqli_num_rows($cena)>0){
        $cena1 = mysqli_fetch_assoc($cena);
        $cena = $cena1['cenaC'];
        $porez = $cena1['porezF'];    
        if($nacin=='Gotovina'){
                $kusur = $iznos - $cena;
                if($kusur<0){
                    echo "Nedovoljno para";
                    exit;
                }
                $result = mysqli_query($con, "insert into RacunRoba (br_licnekarte, kusur,"
                        . " kor_ime_pred, nacin, dato, datum, cena, porez) values ('$licna', "
                        . "'$kusur', '$kor_ime', '$nacin', '$iznos', '$date', $cena, $porez)");
                if($result){
                    $idr = mysqli_query($con, "select max(id) as id from RacunRoba");
                    $idr = mysqli_fetch_assoc($idr);
                    $idr = $idr['id'];
                    $brisi = mysqli_query($con, "update stavka set id_r=$idr where id_r=0");
                    if($brisi){
                        header('Location: ./stavka.php');
                        exit;
                    }else{
                        echo "Greska";
                    }
                }
                else{
                    echo "Greska gotovina";
                }
        }

        if($nacin=='Cek'){
                $result = mysqli_query($con, "insert into RacunRoba (br_licnekarte, ime,"
                        . " kor_ime_pred, nacin, prezime, datum, cena, porez) values ('$licna', "
                        . "'$ime', '$kor_ime', '$nacin', '$prezime', '$date', $cena, $porez)");
                if($result){
                    $idr = mysqli_query($con, "select max(id) as id from RacunRoba");
                    $idr = mysqli_fetch_assoc($idr);
                    $idr = $idr['id'];
                    $brisi = mysqli_query($con, "update stavka set id_r=$idr where id_r=0");
                    if($brisi){
                        header('Location: ./stavka.php');
                        exit;
                    }else{
                        echo "Greska";
                    }
                }
                else{
                    echo "Greska cek";
                }
            }

        if($nacin=='Kartica'){
                $result = mysqli_query($con, "insert into RacunRoba (br_licnekarte,"
                        . " slip, kor_ime_pred, nacin, datum, cena, porez) values ('$licna', "
                        . "'$slip', '$kor_ime', '$nacin', '$date', $cena, $porez)");
                if($result){
                    $idr = mysqli_query($con, "select max(id) as id from RacunRoba");
                    $idr = mysqli_fetch_assoc($idr);
                    $idr = $idr['id'];
                    $brisi = mysqli_query($con, "update stavka set id_r=$idr where id_r=0");
                    if($brisi){
                        header('Location: ./stavka.php');
                        exit;
                    }else{
                        echo "Greska";
                    }
                }
                else{
                    echo "Greska cek";
                }
            }

        if($nacin == 'Virman'){
            $narucioc = $_POST['koje'];
            $result = mysqli_query($con, "insert into RacunRoba (kor_ime_narucioca,"
                        . " kor_ime_pred, nacin, datum, cena, porez) values ('$narucioc', "
                        . "'$kor_ime', '$nacin', '$date', $cena, $porez)");
                if($result){
                    $idr = mysqli_query($con, "select max(id) as id from RacunRoba");
                    $idr = mysqli_fetch_assoc($idr);
                    $idr = $idr['id'];
                    $brisi = mysqli_query($con, "update stavka set id_r=$idr where id_r=0");
                    if($brisi){
                        header('Location: ./stavka.php');
                        exit;
                    }else{
                        echo "Greska";
                    }
                }
                else{
                    echo "Greska cek";
                }
        }
    }else{
        echo "greska - cena";
    }
}