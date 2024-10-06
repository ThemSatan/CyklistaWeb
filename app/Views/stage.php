<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<div class="container">
    <div class='row no-gutters mx-auto' style="margin-top: 50px; ">
    
        <?php 
        foreach($array as $row){
            
        ?>
            <div class='card-profile2 mx-auto'>
                <?php
                echo "<h2 class='text-center text-uppercase form-title'></h2>";
                ?>
                <hr>
                <div class='container' >
                    <table class='table list-table table-hover pt-2 mx-auto'>
                        <tbody class='table-dark'>
                            <tr>
                                <td>No.</td>
                                <td>Datum</td>
                                <td>Poznámka</td>
                                <td>Odjezd</td>
                                <td>Příjezd</td>
                                <td>Vzdálenost</td>
                                <td>Typ</td>
                                <td>Vertikální metry</td>
                                <td>Rok</td>
                            </tr>
                            <tr>
                                <td><?=$row->number?></td>
                                <td><?=$row->date?></td>
                                <td><?=$row->note?></td>
                                <td><?=$row->departure?></td>
                                <td><?=$row->arrival?></td>
                                <td><?=$row->distance?></td>
                                <td><?=$row->parcour_name?></td>
                                <td><?=$row->vertical_meters?></td>
                                <td><?=$row->year_race?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                        <img class='stage-image' src='<?=base_url('assets/images/stages/profiles')."/".$row->profile?>'>
                    </div>
            </div>
    
<?php    
}
?>

            </div>
        </div>
    </div>



<?=$this->endSection();?>