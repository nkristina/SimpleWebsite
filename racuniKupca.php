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
        <h1>Moji racuni</h1>
        <?php
        session_start();
        $kor_ime = $_SESSION['korisnik'];
        $licna = $_SESSION['licna'];
        include_once './dbconnect.php';
        $result = mysqli_query($con, "select r.id, r.nacin, r.cena, p.naziv from"
                . " racunRoba r, preduzece p where r.kor_ime_pred=p.kor_ime and r.br_licnekarte='$licna'");
        if (mysqli_num_rows($result) > 0) {
            ?>
            <table class="tabele">
                <tr>
                    <th>Preduzece</th>
                    <th>Cena</th>
                    <th>Nacin placanja</th>
                    <th>&nbsp;</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $row['naziv'] ?>
                                <input type='hidden' value="<?php echo $row['id'] ?>" name='idR'>
                            <td><?php echo $row['cena'] ?>
                            </td>
                            <td><?php echo $row['nacin'] ?>
                            </td>
                            <td><input type="submit" name='detalji' value='Detalji' class="dugme"></td>
                        </tr>
                    </form>
            <?php } ?>
            </table>
        <?php
        } else {
            echo "Nema racuna.";
        }
        mysqli_free_result($result);
        if (isset($_POST['detalji'])) {
            $idr = $_POST['idR'];
            $result = mysqli_query($con, "select * from racunRoba where"
                    . " id=$idr");
            if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="tabele">
                    <tr>
                        <th>Id Racuna</th>
                        <th>Preduzece</th>
                        <th>Datum</th>
                        <th>Cena</th>
                        <th>Porez</th>
                        <th>Nacin</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Broj licne karte</th>
                        <th>Slip</th>
                        <th>Uplaceno</th>
                        <th>Kusur</th>
                        <th>Narucioc</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['kor_ime_pred'] ?></td>
                            <td><?php echo $row['datum'] ?></td>
                            <td><?php echo $row['cena'] ?></td>
                            <td><?php echo $row['porez'] ?></td>
                            <td><?php echo $row['nacin'] ?></td>
                            <td><?php echo $row['ime'] ?></td>
                            <td><?php echo $row['prezime'] ?></td>
                            <td><?php echo $row['br_licnekarte'] ?></td>
                            <td><?php echo $row['slip'] ?></td>
                            <td><?php echo $row['dato'] ?></td>
                            <td><?php echo $row['kusur'] ?></td>
                            <td><?php echo $row['kor_ime_narucioca'] ?></td>
                        </tr>
                    <?php }
                ?>
                </table>
            <?php
            } else {
                echo "Ne postoje ovsj racuni.";
            }
            
            $result = mysqli_query($con, "select a.naziv, s.kolicina, s.cena, s.porez from stavka s, artikl a where"
                    . " s.id_r=$idr and a.id=s.id_a");
            if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="tabele">
                    <tr>
                        <th>Artikl</th>
                        <th>Kolicina</th>
                        <th>Cena</th>
                        <th>Porez</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?php echo $row['naziv'] ?></td>
                            <td><?php echo $row['kolicina'] ?></td>
                            <td><?php echo $row['cena'] ?></td>
                            <td><?php echo $row['porez'] ?></td>
                        </tr>
                    <?php }
                ?>
                </table>
            <?php
            } else {
                echo "Ne postoje ovsj racuni.";
            }
        }
        mysqli_close($con);
        ?>
    </body>
</html>
