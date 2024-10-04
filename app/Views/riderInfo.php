<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<div class="container">
    <div class='row no-gutters mx-auto' style="margin-top: 50px; ">
        <?php 
   
        foreach($array as $row){

        ?>
            <div class='card-profile mx-auto'>
                <?php
                echo "<h2 class='text-center text-uppercase form-title'>".$row->first_name." ".$row->last_name."</h2>";
                ?>
                <hr>
                <div class='container' >
                    <table class='table list-table table-hover pt-2 mx-auto'>
                        <tbody class='table-dark'>
                            <tr>
                                <td>Stát</td>
                                <td>Datum narození</td>
                                <td>Místo Narození</td>
                                <td>Váha</td>
                                <td>Výška</td>
                            </tr>
                            <tr>
                                <td><span class='flag fi fi-<?=$row->country?>'></td>
                                <td><?=$row->date_of_birth?></td>
                                <td><?=$row->place_of_birth?></td>
                                <td><?=$row->weight?></td>
                                <td><?=$row->height?></td>
                            </tr>
                        </tbody>
                    </table>
                        <img class='profile-image' src='<?=base_url('assets/images/riders')."/".$row->photo?>'>
                    </div>
            </div>
    
<?php    
}
?>

            </div>
        </div>
    </div>



<?=$this->endSection();?>