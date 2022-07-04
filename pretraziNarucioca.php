<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
if(isset($_POST['pretrazi'])){
    $pib = $_POST['pib2'];
    $br_danaa = $_POST['br_dana2'];
    $rabataa = $_POST['rabata2'];
    $result = mysqli_query($con, "select kor_ime, naziv, adresa from preduzece"
        . " where PIB=$pib");
    if(mysqli_num_rows($result)>0){ ?>
        <table class="tabele">
        <tr>
            <th>Naziv</th>
            <th>Adresa</th>
            <th>&nbsp;</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <form action="" method="post">
            <tr>
                <td><?php echo $row['naziv']?>
                    <input type='hidden' name="koje" value='<?php echo $row['kor_ime']?>'></td>
                <td><?php echo $row['adresa']?>
                <input type='hidden' name="rabataT" value='<?php echo $rabataa?>'>
                <input type='hidden' name="br_danaT" value='<?php echo $br_danaa?>'></td>
                <td><input type="submit" name='izaberi' value='Izaberi' class="dugme"></td>
            </tr>
            </form>
            <?php } ?>
        </table>
        Narucioc ce biti dodat sa sledecim vrednostima:&nbsp; Rabata: <?php echo $rabataa?>% &nbsp; Broj dana: <?php echo $br_danaa?>
        <?php  }
        else
        {
            echo "Ne postoji ovakvo preduzece u bazi.";
        }?>    
    <?php 
    mysqli_free_result($result); }
    if(isset($_POST['izaberi'])){
        $kojiN = $_POST['koje']; 
        $rabata_ = $_POST['rabataT'];
        $br_dana_ = $_POST['br_danaT'];
        session_start();
        $kor_ime_tr = $_SESSION['korisnik'];
        $status = mysqli_query($con, "insert into narucioc (kor_ime, kor_imeN, broj_dana, rabata)"
                                . " values ('$kor_ime_tr', '$kojiN', $br_dana_, $rabata_)");
        if($status){
            echo "Uspesno dodat.";
        }
        else{
            echo "<span style='color: red'> Greska pri dodavanju narucioca! </span>";
        }
    }
?>