<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['login'])){
    if(empty($_POST['ime']) || empty($_POST['sifra'])){
        echo "Greska";
    }
    else{
        include_once './dbconnect.php';
        $ime = $_POST['ime'];
        $sifra = $_POST['sifra'];
        
        $result = mysqli_query($con, "select * from kupac where "
                . " kor_ime='$ime' and sifra='$sifra'");
        
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['korisnik'] = $ime;
            $_SESSION['lozinka'] = $sifra;
            session_start();
            $_SESSION['tip'] = 'kupac';
            header('Location: ./kupac.php');
            mysqli_free_result($result);
        }
        else{
            $result = mysqli_query($con, "select * from preduzece where "
                . " kor_ime='$ime' and sifra='$sifra' and status='odobren'");
            
            if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['korisnik'] = $ime;
            $_SESSION['lozinka'] = $sifra;
            session_start();
            $_SESSION['tip'] = 'preduzece';
            echo $row['PDV'];
            if($row['PDV']==null){
                header('Location: ./prviLogin.php');
            }else{
                header('Location: ./preduzece.php');
            }
            mysqli_free_result($result);
            }
            else {
                echo "<span style='color: red'> Pogresno korisnicko ime ili lozinka! </span>";
            }
        }
        mysqli_close($con);
    }
}
?>
