<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['obrisiRacun'])){
    $br_rac = $_POST['brRacuna'];
    $result1 = mysqli_query($con, "delete from racun where"
                . " br_racuna='$br_rac'");
    if($result1){
         header('Refresh:0');
    }
}

if(isset($_POST['obrisiKasu'])){
    $id = $_POST['iid'];
    $result1 = mysqli_query($con, "delete from kasa where"
                . " id='$id'");
    if($result1){
         header('Refresh:0');
    }
}

if(isset($_POST['obrisiA'])){
    $id = $_POST['idA'];
    $result1 = mysqli_query($con, "delete from artikl where"
                . " id='$id'");
    if($result1){
         header('Refresh:0');
    }
}
?>