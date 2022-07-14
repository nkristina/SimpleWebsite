<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="proveraLogIn.js"></script>
    </head>
    <body>
        <h1>Dnevni pazar:</h1>
        <form name="datumm" method="post" onsubmit="return proveriDatum();">
            Datum: <input type="text" name="dan" placeholder="gggg-dd-mm" required="">
            <input type="submit" name="danDugme" value="Izaberi" class="dugme">
        </form>
        <?php
        session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            if(isset($_POST['danDugme'])){
                $datum = $_POST['dan'];
                $result = mysqli_query($con, "select sum(cena) as vrednost, sum(porez) as porez from racunRoba where"
                        . " datum='$datum'");
                if(mysqli_num_rows($result)>0){
                    $vrednost = mysqli_fetch_assoc($result);
                    $vr = $vrednost['vrednost'];
                    $por = $vrednost['porez'];
                    if($vr!=NULL){
                        echo "Ukupna vrednost:"." $vr;    ";
                        $porez = mysqli_query($con, "select PDV from preduzece where kor_ime='$kor_ime'");
                        if(mysqli_num_rows($porez)>0){
                            $porez = mysqli_fetch_assoc($porez);
                            $da = $porez['PDV'];
                            if($da==1){
                                echo "Porez:"." $por";
                            }
                        }else{
                            echo "Grska - porez";
                        }
                    }else{
                            echo "Nema racuna na ovaj dan.";
                    }
                }
                mysqli_free_result($result);
                mysqli_close($con);
        }?>
    </body>
</html>
