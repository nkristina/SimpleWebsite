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
        <h1>Narucioci</h1>
        <?php
            session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
            $result = mysqli_query($con, "select naziv, broj_dana, rabata from preduzece P join narucioc N"
                . " on(P.kor_ime= N.kor_imeN) where N.kor_ime='$kor_ime'");
            if(mysqli_num_rows($result)>0){ ?>
        <table class="tabele">
            <tr>
                <th>Naziv</th>
                <th>Broj dana za placanje</th>
                <th>Rabata [%]</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['naziv']?></td>
                    <td><?php echo $row['broj_dana']?></td>
                    <td><?php echo $row['rabata']?></td>
                </tr>
                <?php }
            }
            else
            {
                echo "Nemate unete narucioce.";
            }?>    
        </table>
        <?php
        mysqli_free_result($result);
        mysqli_close($con);
        ?>
    </body>
</html>
