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
        <?php
        session_start();
        if(!isset($_SESSION['strana'])){
            $_SESSION['strana'] = 1;
        }
        ?>
        <h1>Artikli</h1>
        <form method='post'>
            <input type="submit" name="noviA" value='Unos' class='dugme'>
            <input type='hidden' value="<?php echo $_SESSION['korisnik']?>" name='preduzece'>
        </form> <br/>
        <?php
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            $resultBroj = mysqli_query($con, "select id, sifra, naziv from artikl where"
                . " kor_ime='$kor_ime'");
            $brojRedova = mysqli_num_rows($resultBroj);
            $brojStranica = ceil($brojRedova/5);
            mysqli_free_result($resultBroj);
            $idstr = $_SESSION['strana'];
            $offset = 5*($idstr-1);
            $result = mysqli_query($con, "select id, sifra, naziv, jedinica_mere, proizvodjac, stopa_poreza from artikl where"
                . " kor_ime='$kor_ime' limit 5 offset $offset");
            if(mysqli_num_rows($result)>0){ 
        ?>
        <form action="" method="post">
            <?php echo "Ukupno redova: ".$brojRedova ?> &nbsp;
            <input type="submit" value="<" name="levo">
            <?php echo "strana ".$_SESSION['strana']."/".$brojStranica ?>
            <input type="submit" value=">" name="desno">
        </form>
        <?php
            if(isset($_POST['desno'])){
                if($_SESSION['strana']<$brojStranica) {
                    $_SESSION['strana'] = $_SESSION['strana'] + 1;
                    header('Refresh:0');
                }
            }
            if(isset($_POST['levo'])){
                if($_SESSION['strana']>1) {
                    $_SESSION['strana'] = $_SESSION['strana'] - 1;
                    header('Refresh:0');
                }
            }
        ?>
        <table class="tabele">
            <tr>
                <th>Sifra</th>
                <th>Naziv</th>
                <th>Jedinica mere</th>
                <th>Stopa poreza [%]</th>
                <th>Poizvodjac</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['sifra']?>
                                <input type='hidden' value="<?php echo $row['id']?>" name='idA'>
                            </td>
                            <td><?php echo $row['naziv']?>
                            </td>
                            <td><?php echo $row['jedinica_mere']?>
                            </td>
                            <td><?php echo $row['stopa_poreza']?>
                            </td>
                            <td><?php echo $row['proizvodjac']?>
                            </td>
                            <td><input type="submit" name='obrisiA' value='Obrisi' class="dugme"></td>
                            <td><input type="submit" name='izmeniArtikl' value='Izmeni' class="dugme"></td>
                        </tr>
                    </form>
                <?php } ?>
            </table>
            <?php }
            else
            {
                echo "Nema unetih artikla.";
            }
        mysqli_free_result($result);
        include_once './dodaj.php';
        include_once './obrisi.php';
        include_once './izmeni.php';
        mysqli_close($con);
        ?>
    </body>
</html>
