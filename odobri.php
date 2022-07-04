<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['odobri'])){
    $kor_ime = $_POST['kor_imeP'];
    
    $result2 = mysqli_query($con, "update preduzece set status = 'odobren' where"
                . " kor_ime='$kor_ime'");
    if($result2){
         header('Refresh:0');
    }
}

if(isset($_POST['odbij'])){
    $kor_ime = $_POST['kor_imeP'];
    
    $result2 = mysqli_query($con, "update preduzece set status = 'odbijen' where"
                . " kor_ime='$kor_ime'");
    if($result2){
         header('Refresh:0');
    }
}
?>