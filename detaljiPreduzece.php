<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if(isset($_POST['detaljiP'])){
    $kor_ime=$_POST['kor_ime'];
    $result = mysqli_query($con, "select a.naziv, a.proizvodjac, o.objekat, o.cena_prod from"
            . " objekti o, artikl a where a.kor_ime='$kor_ime' and o.kor_ime='$kor_ime' and o.id_proizvoda=a.id");
    if(mysqli_num_rows($result)>0){?>
        <table class="tabele">
        <tr>
            <th>Naziv</th>
            <th>Proizvodjac</th>
            <th>Dostupno u</th>
            <th>Cena</th>
        </tr>
        <?php
            while($row = mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $row['naziv']?></td>
                <td><?php echo $row['proizvodjac']?></td>
                <td><?php echo $row['objekat']?></td>
                <td><?php echo $row['cena_prod']?></td>
            </tr>
            <?php
            }?>
        </table>
        <?php }
        else
        {
            echo "Nema artikla.";
        }
}