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
                    <table>
                    </table>
                    <p>
                        <?php
                        echo "<br>
                        <hr>
                        <b class='titles'>Stát: </b><span class='flag fi fi-".$row->country."'></span><br>
                        <b class='titles'>Datum narození: </b>".$row->date_of_birth."<br>
                        <b class='titles'>Místo narození: </b>".$row->place_of_birth."<br>
                        <b class='titles'>Váha: </b>".$row->weight." kg <br>
                        <b class='titles'>Výška: </b>".$row->height." cm<br>";
                        ?>
                        <img class='profile-image mx-auto center' src='<?=base_url('assets/images/riders')."/".$row->photo?>'>
                    </p>
                    </div>
            </div>
    
<?php    
}
?>

            </div>
        </div>
    </div>



<?=$this->endSection();?>