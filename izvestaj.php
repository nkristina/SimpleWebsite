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
        if(!isset($_SESSION['tip']) || $_SESSION['tip']!='admin')
        {  
            header('Location: ./index.php');
            exit;
        }
        ?>
        <h1>Dnevni izvestaji:</h1>
        <h2>Pretraga</h2>
        <form name='izvestaj' method="post" onsubmit="return proveriAdmin();">
            Naziv: <input type="text" name="ime"> <br/>
            Pib: <input type="text" name="pib"> <br/>
            Datum: od: <input  type="text" name='od' placeholder='gggg-mm-dd' required=''> &nbsp;
            do: <input type='text' name='do' placeholder='gggg-mm-dd' required="">
            <input type="submit" value="Pretrazi" name="traziD">
        </form>
        <br/>
        <?php
            include_once './dbconnect.php';
                /*$result = mysqli_query($con, "select kor_ime_pred, datum, sum(cena) as cena, sum(porez) as porez from"
                        . " racunRoba group by kor_ime_pred, datum");*/
                $upit = "select r.kor_ime_pred, r.datum, sum(r.cena) as cena, sum(r.porez) as porez from racunRoba r,"
                        . " preduzece p where p.kor_ime=r.kor_ime_pred";
                if(isset($_POST['traziD'])){
                    $od = $_POST['od'];
                    $do = $_POST['do'];
                    $upit=$upit." and r.datum>'$od' and r.datum<'$do'";
                    
                    if($_POST['ime']!=NULL){
                        $naziv=$_POST['ime'];
                        $upit=$upit." and r.kor_ime_pred='$naziv'";
                    }
                    
                    if($_POST['pib']!=NULL){
                        $pib=$_POST['pib'];
                        $upit=$upit." and p.PIB='$pib'";
                    }
                }
                $upit = $upit." group by r.kor_ime_pred, r.datum";
                $result = mysqli_query($con, $upit);
        if(mysqli_num_rows($result)>0){
            $staro = 0;?>
        <table class="tabele">
        <tr>
            <th>Preduzece</th>
            <th>Datum</th>
            <th>Zarada</th>
            <th>Porez</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $row['kor_ime_pred']?></td>
                <td><?php echo $row['datum']?></td>
                <td><?php echo $row['cena']?></td>
                <td><?php echo $row['porez']?></td>
            </tr>
            <?php
            }?>
        </table>
        <?php }
        else
        {
            echo "Ne postoje rezultati.";
        }
        mysqli_free_result($result);
        mysqli_close($con);
        ?>
    </body>
</html>
