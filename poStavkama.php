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
        <h1>Izvestaj:</h1>
        <?php
        session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
                $result = mysqli_query($con, "select r.id as id, r.datum as datum, s.kolicina as kolicina, a.naziv as naziv from racunRoba r, stavka s,"
                        . " artikl a where r.id=s.id_r and a.id=s.id_a and r.kor_ime_pred='$kor_ime'");
        if(mysqli_num_rows($result)>0){
            $staro = 0;?>
        <table class="tabele">
        <tr>
            <th>Id Racuna</th>
            <th>Datum</th>
            <th>Naziv artikla</th>
            <th>Kolicina</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
            if($staro!=$row['id']){?>
            <tr><td colspan="4"><hr/></td></tr><?php
            $staro = $row['id'];
            }?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['datum']?></td>
                <td><?php echo $row['naziv']?></td>
                <td><?php echo $row['kolicina']?></td>
            </tr>
            <?php
            }?>
        </table>
        <?php }
        else
        {
            echo "Ne postoje racuni za vase preduzece.";
        }
        mysqli_free_result($result);
        mysqli_close($con);
        ?>
    </body>
</html>
