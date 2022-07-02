<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['promeni'])){
    if(empty($_POST['trenutna']) || empty($_POST['sifra']) || empty($_POST['sifra2'])){
        echo "Greska";
    }
    else{
        include_once './dbconnect.php';
        $stara = $_POST['trenutna'];
        $sifra = $_POST['sifra'];
        $sifra2 = $_POST['sifra2'];
        $kor_ime = $_SESSION['korisnik'];
        $staraSig = $_SESSION['lozinka'];
        
        if(strcmp($stara, $staraSig)==0){
            if($_SESSION['tip']=='preduzece') {
                $status = mysqli_query($con, "update preduzece set sifra='$sifra' where"
                                . " kor_ime='$kor_ime' and sifra='$stara'");
            }
            elseif($_SESSION['tip']=='kupac'){
                $status = mysqli_query($con, "update kupac set sifra='$sifra' where"
                                . " kor_ime='$kor_ime' and sifra='$stara'");
            }
            else{
                $status = mysqli_query($con, "update admin set sifra='$sifra' where"
                                . " kor_ime='$kor_ime' and sifra='$stara'");
            }
            if($status){
                echo "Uspeno promenjena lozinka.";
                header('Location: ./index.php');
            }
            else {
                echo "<span style='color: red'> Greska pri promeni lozinke, proverite"
                . " da li ste dobro uneli trenutnu lozinku. </span>";
            }
            mysqli_close($con);
        }
        else{
            echo "<span style='color: red'>Pogresna trenutna lozinka. </span>";
        }        
    }
}

if(isset($_GET['nazad'])){
    $tip = $_SESSION['tip'];
    echo "uso";
    if ($tip=='kupac')
        header('Location: ./kupac.php');
    elseif ($tip=='preduzece')
        header ('Location: ./preduzece.php');
    else
        header ('Location: ./admin.php');
}

?>
