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
        <h1>Kategorije</h1>
        <form method="post">
            Dodaj kategoriju: <input type="text" name="naziv" required=''>
            <input type="submit" value="Dodaj" name="kategorija">
        </form>
        <br/>
        <?php
        session_start();
            $kor_ime = $_SESSION['korisnik'];
            include_once './dbconnect.php';
                $result = mysqli_query($con, "select * from kategorijaSve where kor_ime='$kor_ime'");
        if(mysqli_num_rows($result)>0){?>
        <table class="tabele">
        <tr>
            <th>Naziv</th>
            <th>Dodaj artikl</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){?>
                <form method="post">
            <tr>
                <td><?php echo $row['naziv']?>
                    <input type="hidden" name='idk' value="<?php echo $row['id']?>"></td>
                <td><input type="submit" name="dodajA" value='Dodaj artikle' class='dugme'></td>
            </tr>
        </form>
            <?php }
        }else{
            echo "Nema kategorija.";
        }?>
        </table>
        <?php
        mysqli_free_result($result);
        if(isset($_POST['kategorija'])){
            $naziv = $_POST['naziv'];
            $result = mysqli_query($con, "insert into kategorijaSve (naziv, kor_ime)"
                    . " values ('$naziv', '$kor_ime')");
            if($result){
                header('Refresh:0');
            }else{
                echo "geska";
            }
        }
        mysqli_close($con);
        ?>
    </body>
</html>
